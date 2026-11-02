@extends('member.layouts.main')
@section('title', 'Direct Team')
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
                                <h4 class="card-title">List Of Direct Members</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display min-w850">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Image</th>
                                                <th>Joining Date</th>
                                                <th>Member Id</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Downline</th>
                                                <th>Investment</th>
                                                <th>status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i = 1;  @endphp
                                            @foreach ($directData as $list)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>
                                                        @if ($list['profile_image'] == '')
                                                            <img src="{{ asset('uploads/avatar.jpg') }}"
                                                                class="img-fluid img-thumbnail" width="50"
                                                                alt="">
                                                        @else
                                                            <img src="{{ asset('uploads') }}/{{ $list['profile_image'] }}"
                                                                width="50" class="img-fluid img-thumbnail"
                                                                alt="">
                                                        @endif
                                                    </td>
                                                    <td> {{ __(date('d-m-Y', strtotime($list['created_at']))) }}</td>
                                                    <td>{{ __($list['memberid']) }}</td>
                                                    <td>{{ __($list['first_name']) }} {{ __($list['last_name']) }}</td>
                                                    <td>{{ __($list['mobile']) }}</td>
                                                    <td>{{ __($list['downline']) }}</td>
                                                    <td>$ {{ __(totalInvestment($list['memberid']) - selfBizDeinvest($list['memberid'])) }}</td>
                                                    <td>
                                                        @if ($list['status'] == 'Active')
                                                            <div class="badge badge-pill bg-success ">
                                                                {{ __($list['status']) }}
                                                            </div>
                                                        @elseif ($list['status'] == 'Temp')
                                                            <div class="badge badge-pill bg-primary ">
                                                                {{ __($list['status']) }}
                                                            </div>
                                                        @else
                                                            <div class="badge badge-pill bg-danger ">
                                                                {{ __($list['status']) }}
                                                            </div>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @php
                                                    $i++;
                                                @endphp
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
