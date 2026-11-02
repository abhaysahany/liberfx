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
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item active" aria-current="page"><a href="#"
                                        style="text-decoration: none">Member Security</a></li>
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
                    @if (session()->has('message'))
                        <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                    @endif
                    <div class="card" style="zoom:90%">
                        <div class="card-header">
                            <h4>{{ __('Security Table') }}</h4>
                        </div>
                        <div class="card-body px-3">
                            <div class="responsive" style="overflow: auto">
                                <table id="basic-datatable" class="table  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>{{ __('S.No') }}</th>
                                            <th>{{ __('Avatar') }}</th>
                                            <th>{{ __('MemberId') }}</th>
                                            <th>{{ __('Name') }}</th>
                                            <th class="text-center">{{ __('Password') }}</th>
                                            <th class="text-center">{{ __('Liberfx PIN') }}</th>
                                            <th class="text-center">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1;  @endphp
                                        @foreach ($data as $list)
                                            <tr>
                                                <td>{{ $i }}</td>
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
                                                <form action="{{ route('securityUpdate') }}" method="post">
                                                    @csrf
                                                    <td><input class="form-control" type="text" name="password"
                                                            placeholder="Enter Password"></td>
                                                    <td><input class="form-control" type="text" name="pin"
                                                            placeholder="Enter Liberfx Pin">
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="id" value="{{ $list['id'] }}">
                                                        <button class="btn btn-primary">Update</button>
                                                    </td>
                                                </form>
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
