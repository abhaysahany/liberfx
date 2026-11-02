@extends('admin.layouts.main')
@section('title', 'Account Control')
@section('container')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item active" aria-current="page"><a href="#"
                                        style="text-decoration: none">Account Control</a></li>
                            </ol>
                        </nav>

                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="col-md-12">
                    @if (session()->has('statusDeact'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('statusDeact') }}
                        </div>
                    @endif
                    @if (session()->has('statusAct'))
                        <div class="alert alert-primary" role="alert">
                            {{ session('statusAct') }}
                        </div>
                    @endif
                    <div class="card" style="zoom:90%">
                        <div class="card-header">
                            <h4>{{ __('Account Control Table') }}</h4>
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
                                            <th>{{ __('Mobile') }}</th>
                                            <th>{{ __('Sponsor Id') }}</th>
                                            <th>{{ __('Change Status') }}</th>
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
                                                            class="table-user-thumb" alt="" width="60">
                                                    @else
                                                        <img src="{{ asset('uploads') }}/{{ $list['profile_image'] }}"
                                                            class="table-user-thumb rounded-circle" alt=""
                                                            width="60">
                                                    @endif
                                                </td>
                                                <td>{{ $list['memberid'] }}</td>
                                                <td>{{ $list['first_name'] }} {{ $list['last_name'] }}</td>
                                                <td>{{ $list['email'] }}</td>
                                                <td>{{ $list['mobile'] }}</td>
                                                <td>{{ $list['sponsorid'] }}</td>
                                                <td>
                                                    @if ($list['status'] == 'Active')
                                                        <a href="{{ url('admin/account-control') }}/{{ $list['id'] }}"><button
                                                                class="btn btn-primary">{{ $list['status'] }}</button></a>
                                                    @endif
                                                    @if ($list['status'] == 'Blocked')
                                                        <a href="{{ url('admin/account-control') }}/{{ $list['id'] }}"><button
                                                                class="btn btn-danger">{{ $list['status'] }}</button></a>
                                                    @endif
                                                </td>
                                                <td><a href="{{ url('admin/members/member-update') }}/{{ $list['id'] }}"
                                                        class="btn btn-primary"><i class="ik ik-edit"></i> Edit</a></td>

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
