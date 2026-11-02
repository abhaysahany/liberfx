@extends('member.layouts.main')
@section('title', 'Weekly Details')
@section('container')

    <!--**********************************
                                                        Content body start
                                                    ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Weekly Details</h4>
                            </div>
                            <div class="card-body">
                                <table id="responsiveTable" class="display responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Date</th>
                                            <th>Memberid</th>
                                            <th>Name</th>
                                            <th>Level</th>
                                            <th>Package</th>
                                            <th>Amount </th>
                                            <th>Activating Id </th>
                                            <th>Name </th>
                                            <th>Type </th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1;  @endphp
                                        {{-- @foreach ($directData as $list)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ date('d-m-Y', strtotime($list['created_at'])) }}</td>
                                                <td>{{ $list['memberid'] }}</td>
                                                <td>{{ getName($list['memberid']) }}</td>
                                                <td>{{ $list['level'] }}</td>
                                                <td>{{ $list['package'] }}</td>
                                                <td>{{ $list['amount'] }}</td>
                                                <td>{{ $list['activatingId'] }}</td>
                                                <td>{{ $list['name'] }}</td>
                                                <td>{{ $list['type'] }}</td>
                                                <td>
                                                    @if ($list['status'] == 'Unpaid')
                                                        <div class="btn btn-danger">{{ $list['status'] }}</div>
                                                    @elseif ($list['status'] == 'Paid')
                                                        <div class="btn btn-success">{{ $list['status'] }}</div>
                                                    @else
                                                        <div class="btn btn-warning">{{ $list['status'] }}</div>
                                                    @endif
                                                </td>
                                            </tr>
                                            @php $i++;  @endphp
                                        @endforeach --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
                                                        Content body end
                                                    ***********************************-->
@endsection
