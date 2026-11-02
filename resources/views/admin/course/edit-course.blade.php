@extends('admin.layouts.main')
@section('title', 'Edit Course')
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
                                        style="text-decoration: none">Edit Course</a></li>
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
                <div class="col-md-6">
                    @if (session()->has('updateErr'))
                        <div class="alert alert-success" role="alert">
                            {{ session('updateErr') }}
                        </div>
                    @endif
                    @if (session()->has('failedMsg'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('failedMsg') }}
                        </div>
                    @endif
                    <div class="card" style="zoom:90%">
                        <div class="card-header">
                            {{-- <h3>{{ __('Edit Course Data') }}</h3> --}}
                            <span class="h4" style="float: left">{{ __('Edit Course Data') }}</span><span
                                class="ml-auto mr-0" style="float: right"><a href="{{ url('admin/course/all-courses') }}"
                                    class="btn btn-sm btn-primary text-white"> Back</a></span>
                        </div>
                        <div class="card-body px-3">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card-body px-2">
                                        <form action="{{ route('editCourseData') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label>Course Name </label>
                                                        <input type="text" class="form-control" name="course_name"
                                                            value="{{ $cData['course'] }}">
                                                        @error('course_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label>Price </label>
                                                        <input type="number" class="form-control" name="price"
                                                            value="{{ $cData['price'] }}">
                                                        @error('price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label>Description </label>
                                                        <input type="text" class="form-control" name="description"
                                                            value="{{ $cData['description'] }}">
                                                        @error('description')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label>Image </label>
                                                        <input type="file" class="form-control" name="image"
                                                            value="{{ $cData['image'] }}">
                                                        @error('image')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <input type="hidden" class="form-control" name="id"
                                                        value="{{ $cData['id'] }}">
                                                    <button class="btn btn-primary float-right mt-4">Edit Details</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
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
