@extends('admin.layouts.main')
@section('title','Edit Level Stat')
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
                    <h4 class="d-inline">{{ __('Level Stat Form')}}</h4>
                    <a href="{{url('admin/level-stats')}}" class="btn btn-sm btn-primary float-end">Back</a>
                </div>
                <div class="card-body px-3" >
                    <div class="responsive" style="overflow: auto">
                        <form action="{{route('levelStats')}}" method="post">
                            @csrf
                         
                            <div class="form-group mb-3">
                                <label>Level</label>
                                <input type="text" name="level" class="form-control" value="{{$ldata['level']}}" readonly/>
                                @error('level')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Share</label>
                                <input type="text" name="share" class="form-control" value="{{$ldata['share']}}"/>
                                @error('share')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Direct</label>
                                <input type="text" name="direct" class="form-control" value="{{$ldata['direct']}}"/>
                                @error('direct')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
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
  