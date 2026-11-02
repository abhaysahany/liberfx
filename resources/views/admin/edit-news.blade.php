@extends('admin.layouts.main')
@section('title', 'Edit News')
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
                                        style="text-decoration: none">Edit News</a></li>
                            </ol>
                        </nav>

                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-5">
                @if (session()->has('successMsg'))
                    <div class="alert alert-primary" role="alert">
                        {{ session('successMsg') }}
                    </div>
                @endif
                <div class="card" style="zoom:90%">
                    <div class="card-header">
                        <span class="h4">{{ __('Edit News Form') }}</span><span class="ml-auto mr-0"
                            style="float: right"><a href="{{ url('admin/send-news') }}"
                                class="btn btn-sm btn-primary text-white"> Back</a></span>
                    </div>
                    <div class="card-body px-3">
                        <div class="responsive" style="overflow: auto">
                            <form action="{{ route('updateNews') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group mb-3">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ $data['title'] }}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label>Description</label>
                                    <input type="text" class="form-control" name="description"
                                        value="{{ $data['description'] }}">
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="image" value="{{ $data['image'] }}">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <input type="hidden" class="form-control" name="id" value="{{ $data['id'] }}">
                                    <button class="btn btn-primary float-right">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- container -->

    </div>
    <!-- content -->


@endsection
