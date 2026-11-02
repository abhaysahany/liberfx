@extends('admin.layouts.main')
@section('title','Rank Ratio')
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
                        <li class="breadcrumb-item active" aria-current="page"><a href="#" style="text-decoration: none">Rank Ratio</a></li>
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
            @if (session()->has('successMsg'))
            <div class="alert alert-success" role="alert">
                {{session('successMsg')}}
            </div>
            @endif
            <div class="card" style="zoom:90%" >
                <div class="card-header"><h4>{{ __('Rank Ratios Form')}}</h4></div>
                <div class="card-body px-3" >
                    <div class="responsive" style="overflow: auto">
                        <form action="{{route('rankRatios')}}" method="post">
                            @csrf
                        
                            <div class="form-group mb-3">
                                <label>First</label>
                                <input type="text" name="first" class="form-control" value="{{$data['first']}}"/>
                                @error('first')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Rest</label>
                                <input type="text" name="rest" class="form-control" value="{{$data['rest']}}"/>
                                @error('rest')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                                <button class="btn btn-primary float-right">Update Ratio</button>
                            </div>
                        </form>
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
  

              