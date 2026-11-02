@extends('admin.layouts.main')
@section('title', 'Profile Section')
@section('container')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <form class="d-flex">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" id="dash-daterange">
                                <span class="input-group-text bg-primary border-primary text-white">
                                    <i class="mdi mdi-calendar-range font-13"></i>
                                </span>
                            </div>
                            <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                <i class="mdi mdi-autorenew"></i>
                            </a>
                            <a href="javascript: void(0);" class="btn btn-primary ms-1">
                                <i class="mdi mdi-filter-variant"></i>
                            </a>
                        </form>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="col-md-12">
                    @if (session()->has('message'))
                        <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                    @endif
                    <div class="card" style="zoom:90%">
                        <div class="card-header">
                            <h4>{{ __('Member Details Table') }}</h4>
                        </div>
                        <div class="card-body px-3">
                            <div class="responsive" style="overflow: auto">
                                <table id="basic-datatable" class="table  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>{{ __('S.No') }}</th>
                                            <th>{{ __('Joining') }}</th>
                                            <th>{{ __('Avatar') }}</th>
                                            <th>{{ __('Member Id') }}</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Email') }}</th>
                                            <th>{{ __('Sponsor Id') }}</th>
                                            <th>{{ __('Rank') }}</th>
                                            <th>{{ __('Rank Date') }}</th>
                                            <th>{{ __('Main Wallet') }}</th>
                                            <th>{{ __('P2P Wallet') }}</th>
                                            <th>{{ __('Self Invest') }}</th>
                                            <th>{{ __('Team Invest') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1;  @endphp
                                        @foreach ($data as $list)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ date('d-m-Y', strtotime($list['created_at'])) }}<br>{{ date('h:i:s', strtotime($list['created_at'])) }}
                                                </td>
                                                <td>
                                                    @if ($list['profile_image'] == '')
                                                        <img src="{{ asset('uploads/avatar.jpg') }}"
                                                            class="table-user-thumb rounded-circle" alt=""
                                                            width="60">
                                                    @else
                                                        <img src="{{ asset('uploads') }}/{{ $list['profile_image'] }}"
                                                            class="table-user-thumb rounded-circle" alt=""
                                                            width="60">
                                                    @endif
                                                </td>
                                                <td>{{ $list['memberid'] }}</td>
                                                <td>{{ $list['first_name'] }} {{ $list['last_name'] }}</td>
                                                <td>{{ $list['email'] }}</td>
                                                <td>{{ $list['sponsorid'] }}</td>
                                                <td>{{ $list['rank'] }}</td>
                                                <td>
                                                    @if ($list['rank_date'] != null)
                                                        {{ date('d-m-Y', strtotime($list['rank_date'])) }}
                                                    @endif
                                                </td>
                                                <td><span class="badge bg-primary rounded-pill px-2 py-1">$
                                                        {{ $list['lending_wallet'] }}</span></td>
                                                <td><span class="badge bg-warning rounded-pill px-2 py-1">$
                                                        {{ $list['p2p_wallet'] }}</span></td>
                                                <td><a href="#"><span
                                                            class="badge bg-success rounded-pill px-2 py-1">$
                                                            {{ $list['self_invest'] }}</span></a></td>
                                                <td><a href="#"><span
                                                            class="badge bg-secondary rounded-pill px-2 py-1">$
                                                            {{ $list['team_invest'] }}</span></a></td>
                                                <td><span class="btn btn-primary">{{ $list['status'] }}</span></td>
                                                <td>
                                                    <div class="table-actions text-center">
                                                        <a href="{{ url('admin/member-login') }}/{{ $list['memberid'] }}"
                                                            target="_blank" class="btn btn-success"><i
                                                                class="ik ik-eye"></i> View</a>
                                                    </div>
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
            </div> <!-- end col-->
        </div>
        <!-- end row -->

    </div>
    <!-- container -->

    </div>
    <!-- content -->


@endsection
