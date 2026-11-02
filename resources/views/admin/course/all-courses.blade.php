@extends('admin.layouts.main')
@section('title', 'All Courses')
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
                                        style="text-decoration: none">All Courses</a></li>
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
                    @if (session()->has('wMessage'))
                        <div class="alert alert-primary">{{ session('wMessage') }}</div>
                    @endif
                    <div class="card" style="zoom:90%">
                        <div class="card-header">
                            <h4>{{ __('Buy All Courses') }}</h4>
                        </div>
                        <div class="card-body px-3">
                            <div class="responsive" style="overflow: auto">
                                <table id="basic-datatable" class="table  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>{{ __('S.No') }}</th>
                                            <th>{{ __('Image') }}</th>
                                            <th>{{ __('Course Name') }}</th>
                                            <th>{{ __('Description') }}</th>
                                            <th>{{ __('Price') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($courses as $list)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td><img src="{{ asset('adm_assets/assets/images/courses') }}/{{ $list['image'] }}"
                                                        alt="course_img" width="100px"></td>
                                                <td>{{ __($list['course']) }}</td>
                                                <td>{{ __($list['description']) }}</td>
                                                <td>$ {{ __($list['price']) }}</td>
                                                <td><a href="{{ url('admin/course/edit-course') }}/{{ $list['id'] }}"
                                                        class="btn btn-primary"><i class="ik ik-edit"></i> Edit</a></td>
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
            </div> <!-- end col-->
        </div>
        <!-- end row -->

    </div>
    <!-- container -->

    </div>
    <!-- content -->


@endsection
