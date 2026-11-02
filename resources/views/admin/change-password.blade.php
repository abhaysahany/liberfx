@extends('admin.layouts.main')
@section('title','Change Password')
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
                        <li class="breadcrumb-item active" aria-current="page"><a href="#" style="text-decoration: none">Change Password</a></li>
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
            @if (session()->has('failedMsg'))
            <div class="alert alert-danger" role="alert">
                {{session('failedMsg')}}
            </div>
            @endif
            @if (session()->has('successMsg'))
                <div class="alert alert-success" role="alert">
                    {{session('successMsg')}}
                </div>
            @endif
            <div class="card" style="zoom:90%" >
                <div class="card-header">
                    <span class="h4">{{ __('Change Password')}}</span><span class="ml-auto mr-0" style="float: right">
                        </span></div>
                
                <div class="card-body px-3" >
                    <form action="{{route('changePassword')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Admin Password </label>
                            <input type="password" class="form-control" name="password" placeholder="Enter Password" >
                            @error('password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Retype Password </label>
                            <input type="password" class="form-control" name="password_confirmation" id="exampleInputName1" placeholder="Retype Password">
                            @error('password_confirmation')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div>
                            <button class="btn btn-primary float-end">Change Password</button>
                        </div>
                    </form>
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
  