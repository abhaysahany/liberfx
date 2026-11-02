@extends('admin.layouts.main')
@section('title','Member Update')
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
                        <li class="breadcrumb-item active" aria-current="page"><a href="#" style="text-decoration: none">Member Update</a></li>
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
            @if (session()->has('updateErr'))
                    <div class="alert alert-success" role="alert">
                        {{session('updateErr')}}
                    </div>
                @endif
            <div class="card" style="zoom:90%" >
                <div class="card-header"><h3>{{ __('Member Details Updates')}}</h3></div>
                <div class="card-body px-3" >
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-body px-5"> 
                                <form action="{{route('updateDetails')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            @if ($data['profile_image']== NULL)
                                              <img  src="{{ asset('uploads/avatar.jpg')}}" alt="" style="width: 90%"> 
                                            @else
                                              <img  src="{{ asset('uploads')}}/{{$data['profile_image']}}" alt="" style="width: 90%">  
                                            @endif
                                            <img src=""/>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group mb-3">
                                                <label>First Name </label>
                                                <input type="text" class="form-control" name="first_name" value="{{$data['first_name']}}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>Last Name </label>
                                                <input type="text" class="form-control" name="last_name" value="{{$data['last_name']}}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>Email</label>
                                                <input type="text" class="form-control" name="email" value="{{$data['email']}}">
                                                @error('email')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>Mobile</label>
                                                <input type="text" class="form-control" name="mobile" value="{{$data['mobile']}}">
                                                @error('mobile')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>Wallet Address</label>
                                                <input type="text" class="form-control" name="wallet_address" value="{{$data['wallet_address']}}">
                                                @error('wallet_address')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div> 
                                        <div class="col-md-12 mt-3">
                                            <div class="form-group">
                                                <label>Profile Image</label>
                                                <input type="file" name="image" class="form-control" id="inputGroupFile04">
                                             </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                            <input type="hidden" class="form-control" name="id" value="{{$data['id']}}"> 
                                            <button class="btn btn-primary float-right mt-4">Update Details</button>
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
  

              