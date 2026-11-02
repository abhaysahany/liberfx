@extends('admin.layouts.main')
@section('title', 'Manual Withdrawal History')
@section('container')
    @php
        $isEdit = !empty($editRecord);
        $formAction = $isEdit ? route('manualWithdrawalHistory.update', $editRecord['id']) : route('manualWithdrawalHistory.store');
        $selectedMemberId = old('member_id', $isEdit ? $editRecord['member_id'] : '');
        $selectedMemberName = old('member_name', $isEdit ? $editRecord['member_name'] : '');
    @endphp

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container .select2-selection--single {
            height: 38px;
            border: 1px solid #dee2e6;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 36px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 36px;
        }

        .manual-withdrawal-table td {
            vertical-align: middle;
            white-space: normal;
        }

        .manual-wallet-address,
        .manual-remarks {
            max-width: 240px;
            overflow-wrap: anywhere;
            word-break: break-word;
        }

        .manual-withdrawal-form .form-label {
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        .manual-withdrawal-form .form-control,
        .manual-withdrawal-form .form-select,
        .manual-withdrawal-form textarea {
            min-height: 44px;
        }
    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item active" aria-current="page">
                                    <a href="#" style="text-decoration: none">Manual Withdrawal History</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="col-md-12">
                    @if (session()->has('successMsg'))
                        <div class="alert alert-success">{{ session('successMsg') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            Please correct the highlighted fields and try again.
                        </div>
                    @endif

                    <div class="card mb-3" style="zoom:90%">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">{{ $isEdit ? __('Edit Manual Withdrawal History') : __('Create Manual Withdrawal History') }}</h4>
                            @if ($isEdit)
                                <a href="{{ url('admin/manual-withdrawal-history') }}" class="btn btn-sm btn-secondary">Cancel Edit</a>
                            @endif
                        </div>
                        <div class="card-body">
                            <form action="{{ $formAction }}" method="post" class="manual-withdrawal-form">
                                @csrf
                                @if ($isEdit)
                                    @method('PUT')
                                @endif

                                <input type="hidden" name="wallet_address"
                                    value="{{ old('wallet_address', $isEdit ? $editRecord['wallet_address'] : '') }}">
                                <input type="hidden" name="wallet_type"
                                    value="{{ old('wallet_type', $isEdit ? $editRecord['wallet_type'] : $walletTypes[0] ?? 'Main Wallet') }}">
                                <input type="hidden" name="payment_date"
                                    value="{{ old('payment_date', $isEdit ? $editRecord['payment_date'] : old('request_date', date('Y-m-d'))) }}">
                                <input type="hidden" name="remarks"
                                    value="{{ old('remarks', $isEdit ? $editRecord['remarks'] : '') }}">

                                <div class="row g-3">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Member ID <span class="text-danger">*</span></label>
                                        <select class="form-control" id="member_id" name="member_id" required>
                                            @if ($selectedMemberId)
                                                <option value="{{ $selectedMemberId }}" selected>
                                                    {{ $selectedMemberId }}{{ $selectedMemberName ? ' - ' . $selectedMemberName : '' }}
                                                </option>
                                            @endif
                                        </select>
                                        @error('member_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Member Name</label>
                                        <input type="text" class="form-control" id="member_name" value="{{ $selectedMemberName }}" readonly>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Request Date <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="request_date"
                                            value="{{ old('request_date', $isEdit ? $editRecord['request_date'] : date('Y-m-d')) }}" required>
                                        @error('request_date')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Wallet Address / QR Code <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="wallet_address" rows="2" required>{{ old('wallet_address', $isEdit ? $editRecord['wallet_address'] : '') }}</textarea>
                                        @error('wallet_address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Coin <span class="text-danger">*</span></label>
                                        <select class="form-control" name="coin" required>
                                            <option value="">Select Coin</option>
                                            @foreach ($coins as $coin)
                                                <option value="{{ $coin }}" @selected(old('coin', $isEdit ? $editRecord['coin'] : '') == $coin)>{{ $coin }}</option>
                                            @endforeach
                                        </select>
                                        @error('coin')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Wallet Type <span class="text-danger">*</span></label>
                                        <select class="form-control" name="wallet_type" required>
                                            <option value="">Select Wallet</option>
                                            @foreach ($walletTypes as $walletType)
                                                <option value="{{ $walletType }}" @selected(old('wallet_type', $isEdit ? $editRecord['wallet_type'] : '') == $walletType)>{{ $walletType }}</option>
                                            @endforeach
                                        </select>
                                        @error('wallet_type')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    
                                     <div class="col-md-4 mb-3">
                                        <label class="form-label">USDT Amount <span class="text-danger">*</span></label>
                                        <input type="number" step="0.00000001" min="0" class="form-control amount-field" id="usdt"
                                            name="usdt" value="{{ old('usdt', $isEdit ? $editRecord['usdt'] : '0') }}" required>
                                        @error('usdt')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Gross Amount <span class="text-danger">*</span></label>
                                        <input type="number" step="0.00000001" min="0" class="form-control amount-field" id="gross_amount"
                                            name="gross_amount" value="{{ old('gross_amount', $isEdit ? $editRecord['gross_amount'] : '0') }}" required>
                                        @error('gross_amount')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Charges <span class="text-danger">*</span></label>
                                        <input type="number" step="0.00000001" min="0" class="form-control amount-field" id="charges"
                                            name="charges" value="{{ old('charges', $isEdit ? $editRecord['charges'] : '0') }}" readonly required>
                                        @error('charges')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Net Amount</label>
                                        <input type="number" step="0.00000001" class="form-control" id="net_amount"
                                            value="{{ old('net_amount', $isEdit ? $editRecord['net_amount'] : '') }}" readonly>
                                    </div>

                                    {{-- <div class="col-md-3 mb-3">
                                        <label class="form-label">Payment Date <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="payment_date"
                                            value="{{ old('payment_date', $isEdit ? $editRecord['payment_date'] : date('Y-m-d')) }}" required>
                                        @error('payment_date')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div> --}}

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Status <span class="text-danger">*</span></label>
                                        <select class="form-control" name="status" required>
                                            <option value="">Select Status</option>
                                            @foreach ($statuses as $status)
                                                <option value="{{ $status }}" @selected(old('status', $isEdit ? $editRecord['status'] : 'Approved') == $status)>{{ $status }}</option>
                                            @endforeach
                                        </select>
                                        @error('status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- <div class="col-md-9 mb-3">
                                        <label class="form-label">Admin Remarks</label>
                                        <textarea class="form-control" name="remarks" rows="2">{{ old('remarks', $isEdit ? $editRecord['remarks'] : '') }}</textarea>
                                    </div> --}}
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">
                                        {{ $isEdit ? __('Update Record') : __('Create Record') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card" style="zoom:90%">
                        <div class="card-header">
                            <h4>{{ __('Manual Withdrawal History Records') }}</h4>
                        </div>
                        <div class="card-body px-3">
                            <div class="responsive" style="overflow: auto">
                                <table id="basic-datatable" class="table nowrap w-100 manual-withdrawal-table">
                                    <thead>
                                        <tr>
                                            <th>{{ __('S.No') }}</th>
                                            <th>{{ __('Request Date') }}</th>
                                            <th>{{ __('Member ID') }}</th>
                                            <th>{{ __('Member Name') }}</th>
                                            <th>{{ __('Wallet Address') }}</th>
                                            {{-- <th>{{ __('Coin') }}</th> --}}
                                            <th>{{ __('USDT') }}</th>
                                            <th>{{ __('Gross Amount') }}</th>
                                            <th>{{ __('Charges') }}</th>
                                            <th>{{ __('Net Amount') }}</th>
                                            {{-- <th>{{ __('Wallet Type') }}</th> --}}
                                            {{-- <th>{{ __('Payment Date') }}</th> --}}
                                            <th>{{ __('Status') }}</th>
                                            {{-- <th>{{ __('Remarks') }}</th> --}}
                                            <th class="text-center">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @foreach ($data as $list)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ date('d-m-Y', strtotime($list['request_date'])) }}</td>
                                                <td>{{ $list['member_id'] }}</td>
                                                <td>{{ $list['member_name'] }}</td>
                                                <td class="manual-wallet-address">{{ $list['wallet_address'] }}</td>
                                                {{-- <td>{{ $list['coin'] }}</td> --}}
                                                <td>$ {{ $list['usdt'] }}</td>
                                                <td>$ {{ $list['gross_amount'] }}</td>
                                                <td>$ {{ $list['charges'] }}</td>
                                                <td>$ {{ $list['net_amount'] }}</td>
                                                {{-- <td><b>{{ $list['wallet_type'] }}</b></td> --}}
                                                {{-- <td>{{ date('d-m-Y', strtotime($list['payment_date'])) }}</td> --}}
                                                <td>
                                                    @if ($list['status'] == 'Approved')
                                                        <span class="badge bg-success">Approved</span>
                                                    @elseif ($list['status'] == 'Pending')
                                                        <span class="badge bg-warning">Pending</span>
                                                    @else
                                                        <span class="badge bg-danger">Cancelled</span>
                                                    @endif
                                                </td>
                                                {{-- <td class="manual-remarks">{{ $list['remarks'] ?? '--' }}</td> --}}
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-sm btn-info view-manual-record"
                                                        data-member="{{ $list['member_id'] }}"
                                                        data-name="{{ $list['member_name'] }}"
                                                        data-wallet="{{ $list['wallet_address'] }}"
                                                        data-coin="{{ $list['coin'] }}"
                                                        data-gross="{{ $list['gross_amount'] }}"
                                                        data-charges="{{ $list['charges'] }}"
                                                        data-net="{{ $list['net_amount'] }}"
                                                        data-wallet-type="{{ $list['wallet_type'] }}"
                                                        data-request-date="{{ $list['request_date'] }}"
                                                        data-payment-date="{{ $list['payment_date'] }}"
                                                        data-status="{{ $list['status'] }}"
                                                        data-remarks="{{ $list['remarks'] ?? '--' }}">View</button>
                                                    <a href="{{ url('admin/manual-withdrawal-history/edit') }}/{{ $list['id'] }}"
                                                        class="btn btn-sm btn-primary">Edit</a>
                                                    <form action="{{ route('manualWithdrawalHistory.destroy', $list['id']) }}"
                                                        method="post" class="d-inline"
                                                        onsubmit="return confirm('Are you sure you want to delete this record?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @php $i++; @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="manualWithdrawalViewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Manual Withdrawal Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-2"><b>Member ID:</b> <span id="view_member"></span></div>
                        <div class="col-md-6 mb-2"><b>Member Name:</b> <span id="view_name"></span></div>
                        <div class="col-md-6 mb-2"><b>Request Date:</b> <span id="view_request_date"></span></div>
                        <div class="col-md-6 mb-2"><b>Payment Date:</b> <span id="view_payment_date"></span></div>
                        <div class="col-md-6 mb-2"><b>Coin:</b> <span id="view_coin"></span></div>
                        <div class="col-md-6 mb-2"><b>Wallet Type:</b> <span id="view_wallet_type"></span></div>
                        <div class="col-md-4 mb-2"><b>Gross:</b> $ <span id="view_gross"></span></div>
                        <div class="col-md-4 mb-2"><b>Charges:</b> $ <span id="view_charges"></span></div>
                        <div class="col-md-4 mb-2"><b>Net:</b> $ <span id="view_net"></span></div>
                        <div class="col-md-6 mb-2"><b>Status:</b> <span id="view_status"></span></div>
                        <div class="col-12 mb-2"><b>Wallet Address:</b><br><span id="view_wallet" class="manual-wallet-address d-block"></span></div>
                        <div class="col-12"><b>Remarks:</b><br><span id="view_remarks" class="manual-remarks d-block"></span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('load', function() {
            var select2Script = document.createElement('script');
            select2Script.src = 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js';
            select2Script.onload = initializeManualWithdrawalPage;
            document.body.appendChild(select2Script);
        });

        function initializeManualWithdrawalPage() {
            var memberSelect = $('#member_id');

            memberSelect.select2({
                width: '100%',
                placeholder: 'Search Member ID',
                allowClear: true,
                ajax: {
                    url: '{{ route('manualWithdrawalHistory.searchMember') }}',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term || ''
                        };
                    },
                    processResults: function(data) {
                        return data;
                    }
                }
            });

            memberSelect.on('select2:select', function(e) {
                $('#member_name').val(e.params.data.member_name || '');
            });

            memberSelect.on('change', function() {
                var memberId = $(this).val();

                if (!memberId) {
                    $('#member_name').val('');
                    return;
                }

                $.ajax({
                    url: '{{ route('manualWithdrawalHistory.searchMember') }}',
                    type: 'GET',
                    data: {
                        member_id: memberId
                    },
                    success: function(response) {
                        if (response.status) {
                            $('#member_name').val(response.member.member_name);
                        }
                    }
                });
            });

            $('#usdt, #gross_amount').on('input keyup', function() {
                calculateNetAmount();
            });

            calculateNetAmount();

            $('.view-manual-record').on('click', function() {
                var button = $(this);
                $('#view_member').text(button.data('member'));
                $('#view_name').text(button.data('name'));
                $('#view_request_date').text(button.data('request-date'));
                $('#view_payment_date').text(button.data('payment-date'));
                $('#view_coin').text(button.data('coin'));
                $('#view_wallet_type').text(button.data('wallet-type'));
                $('#view_gross').text(button.data('gross'));
                $('#view_charges').text(button.data('charges'));
                $('#view_net').text(button.data('net'));
                $('#view_status').text(button.data('status'));
                $('#view_wallet').text(button.data('wallet'));
                $('#view_remarks').text(button.data('remarks'));
                $('#manualWithdrawalViewModal').modal('show');
            });
        }

        function calculateNetAmount() {
            var usdtAmount = parseFloat($('#usdt').val()) || 0;
            var grossAmount = parseFloat($('#gross_amount').val()) || 0;

            // Use the gross amount when it is present. Otherwise, fall back to the USDT value.
            var inputAmount = grossAmount > 0 ? grossAmount : usdtAmount;

            // Fixed processing fee is 10% of the active input amount.
            var charges = inputAmount * 0.10;
            var netAmount = Math.max(grossAmount - charges, 0);

            $('#charges').val(charges.toFixed(8).replace(/\.?0+$/, ''));
            $('#net_amount').val(netAmount.toFixed(8).replace(/\.?0+$/, ''));
        }
    </script>
@endsection
