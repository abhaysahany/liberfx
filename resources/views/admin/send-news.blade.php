@extends('admin.layouts.main')
@section('title', 'Send News')
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
                                        style="text-decoration: none">Send News</a></li>
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
                        <h4>{{ __('Send News Form') }}</h4>
                    </div>
                    <div class="card-body px-3">
                        <div class="responsive" style="overflow: auto">
                            <form action="{{ route('insertNews') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group mb-3">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title"
                                        placeholder="Enter News Title">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label>Description</label>
                                    <input type="text" class="form-control" name="description"
                                        placeholder="Enter News Description">
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="image">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <button class="btn btn-primary float-right">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                @if (session()->has('delMsg'))
                    <div class="alert alert-primary" role="alert">
                        {{ session('delMsg') }}
                    </div>
                @endif
                <div class="card" style="zoom:90%">
                    <div class="card-header">
                        <h4>{{ __('Send News Table') }}</h4>
                    </div>
                    <div class="card-body px-3">
                        <div class="responsive" style="overflow: auto">
                            <table id="basic-datatable" class="table  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>{{ __('S.No') }}</th>
                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('Description') }}</th>
                                        <th>{{ __('Image') }}</th>
                                        <th class="text-center" colspan="2">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1;  @endphp
                                    @foreach ($data as $list)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $list['title'] }}</td>
                                            <td>{{ $list['description'] }}</td>
                                            <td><img src="{{ asset('adm_assets/assets/images/news') }}/{{ $list['image'] }}"
                                                    alt="" style="width: 150px;height:150px">
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <a class="btn btn-primary text-white"
                                                        href="{{ url('admin/news/edit') }}/{{ $list['id'] }}">Edit</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <a class="btn btn-danger text-white"
                                                        href="{{ url('admin/news/delete') }}/{{ $list['id'] }}">Delete</a>
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
            <!-- end row -->

        </div>
        <!-- container -->

    </div>
    <!-- content -->


@endsection
