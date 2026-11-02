@extends('member.layouts.main')
@section('title', 'Copy Summary Details')
@section('container')

    <!--**********************************
                                                                                                                                                                                                                                                                                                                                            Content body start
                                                                                                                                                                                                                                                                                                                                        ***********************************-->
    <div class="content-body copy-summary-page">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="col-12">
                        <div class="card copy-summary-card">
                            <div class="card-header">
                                <h4 class="card-title copy-summary-title">Copy Summary Details</h4>
                            </div>
                            <div class="card-body copy-summary-wrap">
                                <div class="table-responsive">
                                    <table id="example3" class="display min-w850">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Brought Forward</th>
                                                <th>Total Profit</th>
                                                <th>Total Loss</th>
                                                <th>Balance </th>
                                                <th>Carry Forward</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i = 1;  @endphp
                                            @foreach ($cpData as $list)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $list['start_date'] }}</td>
                                                    <td>{{ $list['end_date'] }}</td>
                                                    <td>{{ $list['brought_forward'] }}</td>
                                                    <td>$ {{ $list['total_profit'] }}</td>
                                                    <td>$ {{ $list['total_loss'] }}</td>
                                                    <td>$ {{ $list['balance'] }}</td>
                                                    <td>$ {{ $list['carry_forward'] }}</td>
                                                    {{-- <td>
                                                    @if ($list['status'] == 'Open')
                                                        <span class="btn btn-success">{{ $list['status'] }}</span>
                                                    @else
                                                        <span class="btn btn-danger">{{ $list['status'] }}</span>
                                                    @endif
                                                </td> --}}
                                                    <td>
                                                        <a href="{{ url('/member/pay-now') }}/{{ $list['id'] }}"
                                                            class="btn btn-primary copy-summary-pay-btn">Pay
                                                            Now</a>
                                                    </td>
                                                </tr>
                                                @php $i++;  @endphp
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
    </div>
    <!--**********************************
                                                                                                                                                                                                                                                                                                                                            Content body end
                                                                                                                                                                                                                                                                                                                                        ***********************************-->
@endsection
