@extends('admin.layouts.main')
@section('title','Edit Fund Request Stat')
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
                        <li class="breadcrumb-item active" aria-current="page"><a href="#" style="text-decoration: none">Level Stat</a></li>
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
            <div class="alert alert-success" role="alert">
                {{session('successMsg')}}
            </div>
            @endif
            @if (session()->has('failedMsg'))
            <div class="alert alert-danger" role="alert">
                {{session('failedMsg')}}
            </div>
            @endif
            <div class="card" style="zoom:90%" >
                <div class="card-header pt-3">
                    <h4 class="d-inline">{{ __('Fund Request Stat Form')}}</h4>
                    <a href="{{url('admin/fund-request-stat')}}" class="btn btn-sm btn-primary float-end">Back</a>
                </div>
                <div class="card-body px-3" >
                    <div class="responsive" style="overflow: auto">
                        <form action="{{route('fundStats')}}" method="post" enctype="multipart/form-data">
                            @csrf
                         
                            <div class="form-group mb-3">
                                <label>Coin</label>
                                <input type="text" name="coin" class="form-control" value="{{$statData['coin']}}" readonly/>
                                @error('coin')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" value="{{$statData['address']}}"/>
                                @error('address')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control" value="{{$statData['image']}}" />
                                @error('image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                                <input type="hidden" name="id" value="{{$statData['id']}}" class="form-control">
                                <button class="btn btn-primary float-end">Update Stat</button>
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
  