<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManualWithdrawalHistory;
use App\Models\MemberDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rule;

class ManualWithdrawalHistoryController extends Controller
{
    private array $coins = ['USDT BEP20', 'USDT TRC20', 'BTC', 'ETH', 'BNB'];

    private array $walletTypes = ['Lending Wallet', 'Trading Wallet', 'Course Wallet'];

    private array $statuses = ['Approved', 'Pending', 'Cancelled'];

    public function index()
    {
        $result['data'] = ManualWithdrawalHistory::orderBy('created_at', 'DESC')->get();
        $result['editRecord'] = null;
        $result['coins'] = $this->coins;
        $result['walletTypes'] = $this->walletTypes;
        $result['statuses'] = $this->statuses;

        return view('admin.manual-withdrawal-history')->with($result);
    }

    public function store(Request $request)
    {
        $validated = $this->validatedData($request);
        $member = $this->findMember($validated['member_id']);

        if (!$member) {
            return redirect()->back()->withInput()->withErrors(['member_id' => 'Selected member does not exist.']);
        }

        $validated['member_name'] = $this->memberName($member);
        $validated['net_amount'] = $this->netAmount($validated['gross_amount'], $validated['charges']);
        $validated['created_by'] = session('ADMIN_ID');
        $validated['request_id'] =  $validated['member_id'] . time();

        ManualWithdrawalHistory::create($validated);

        session()->flash('successMsg', 'Manual withdrawal history has been created successfully.');
        return redirect('admin/manual-withdrawal-history');
    }

    public function edit($id)
    {
        $result['data'] = ManualWithdrawalHistory::orderBy('created_at', 'DESC')->get();
        $result['editRecord'] = ManualWithdrawalHistory::findOrFail($id);
        $result['coins'] = $this->coins;
        $result['walletTypes'] = $this->walletTypes;
        $result['statuses'] = $this->statuses;

        return view('admin.manual-withdrawal-history')->with($result);
    }

    public function update(Request $request, $id)
    {
        $record = ManualWithdrawalHistory::findOrFail($id);
        $validated = $this->validatedData($request);
        $member = $this->findMember($validated['member_id']);

        if (!$member) {
            return redirect()->back()->withInput()->withErrors(['member_id' => 'Selected member does not exist.']);
        }

        $validated['member_name'] = $this->memberName($member);
        $validated['net_amount'] = $this->netAmount($validated['gross_amount'], $validated['charges']);

        $record->update($validated);

        session()->flash('successMsg', 'Manual withdrawal history has been updated successfully.');
        return redirect('admin/manual-withdrawal-history');
    }

    public function destroy($id)
    {
        ManualWithdrawalHistory::findOrFail($id)->delete();

        session()->flash('successMsg', 'Manual withdrawal history has been deleted successfully.');
        return redirect('admin/manual-withdrawal-history');
    }

    public function searchMember(Request $request)
    {
        if ($request->filled('member_id')) {
            $member = $this->findMember($request->get('member_id'));

            if (!$member) {
                return response()->json(['status' => false, 'message' => 'Member not found.'], 404);
            }

            return response()->json([
                'status' => true,
                'member' => [
                    'member_id' => $this->memberId($member),
                    'member_name' => $this->memberName($member),
                ],
            ]);
        }

        $term = $request->get('q', '');
        $members = $this->memberQuery($term)->limit(20)->get();

        return response()->json([
            'results' => $members->map(function ($member) {
                $memberId = $this->memberId($member);
                $memberName = $this->memberName($member);

                return [
                    'id' => $memberId,
                    'text' => trim($memberId . ' - ' . $memberName),
                    'member_name' => $memberName,
                ];
            })->values(),
        ]);
    }

    private function validatedData(Request $request): array
    {
        $validated = $request->validate([
            'member_id' => 'required',
            'request_date' => 'required|date',
            'wallet_address' => 'nullable|string',
            'coin' => ['required', Rule::in($this->coins)],
            'usdt' => 'required|numeric|min:0',
            'gross_amount' => 'required|numeric|min:0',
            'charges' => 'required|numeric|min:0',
            'wallet_type' => ['nullable', Rule::in($this->walletTypes)],
            'payment_date' => 'nullable|date',
            'status' => ['required', Rule::in($this->statuses)],
            'remarks' => 'nullable|string',
        ]);

        $validated['wallet_address'] = $validated['wallet_address'] ?? '';
        $validated['wallet_type'] = $validated['wallet_type'] ?? $this->walletTypes[0];
        $validated['payment_date'] = $validated['payment_date'] ?? $validated['request_date'];
        $validated['remarks'] = $validated['remarks'] ?? null;

        return $validated;
    }

    private function netAmount($grossAmount, $charges): float
    {
        return max((float) $grossAmount - (float) $charges, 0);
    }

    private function findMember(string $memberId): ?object
    {
        return $this->memberQuery($memberId, true)->first();
    }

    private function memberQuery(string $term = '', bool $exact = false)
    {
        if (Schema::hasColumn('users', 'memberid')) {
            $query = User::query();
            $memberColumn = 'memberid';
            $nameColumns = $this->userNameColumns();
        } else {
            $query = MemberDetail::query();
            $memberColumn = 'memberid';
            $nameColumns = ['first_name', 'last_name'];
        }

        if ($term !== '') {
            $query->where(function ($memberQuery) use ($term, $exact, $memberColumn, $nameColumns) {
                if ($exact) {
                    $memberQuery->where($memberColumn, $term);
                    return;
                }

                $memberQuery->where($memberColumn, 'like', '%' . $term . '%');

                foreach ($nameColumns as $column) {
                    $memberQuery->orWhere($column, 'like', '%' . $term . '%');
                }
            });
        }

        return $query->orderBy($memberColumn, 'ASC');
    }

    private function memberId(object $member): string
    {
        return (string) ($member->memberid ?? $member->id);
    }

    private function memberName(object $member): string
    {
        if (isset($member->name) && trim((string) $member->name) !== '') {
            return trim((string) $member->name);
        }

        return trim(($member->first_name ?? '') . ' ' . ($member->last_name ?? ''));
    }

    private function userNameColumns(): array
    {
        $columns = [];

        foreach (['name', 'first_name', 'last_name'] as $column) {
            if (Schema::hasColumn('users', $column)) {
                $columns[] = $column;
            }
        }

        return $columns;
    }
}
