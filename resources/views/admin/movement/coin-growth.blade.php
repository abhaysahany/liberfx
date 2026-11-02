@extends('admin.layouts.main')
@section('title','Change in Coin')
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
                        <li class="breadcrumb-item active" aria-current="page"><a href="#" style="text-decoration: none">Change in Coin</a></li>
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
            @if (session()->has('coinFailMsg'))
            <div class="alert alert-danger" role="alert">
                {{session('coinFailMsg')}}
            </div>
            @endif
            @if (session()->has('coinSuccMsg'))
                <div class="alert alert-success" role="alert">
                    {{session('coinSuccMsg')}}
                </div>
            @endif
            <div class="card" style="zoom:90%" >
                <div class="card-header"><h4>{{ __('Coin Change Form')}}</h4></div>
                <div class="card-body px-3" >
                    <div class="responsive" style="overflow: auto">
                        <form action="{{route('coingrowth')}}" method="post" >
                            @csrf
                            <div class="form-group mb-3">
                                <label>Coin </label>
                                <select class="form-control" id="exampleSelectGender" name="coin">
                                    <option value="">Select Coin</option>
                                    <option value="BNIX-USDT">BNIX-USDT</option>
                                    <option value="VOXA-USDT">VOXA-USDT</option>
                                </select>
                                @error('coin')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Change Type </label>
                                <select class="form-control" id="exampleSelectGender" name="type">
                                    <option value="">Select Type</option>
                                    <option value="High">High</option>
                                    <option value="Low">Low</option>
                                </select>
                                @error('type')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Start Time </label>
                                <input  type="datetime-local" name="starttime" class="form-control"  />
                                @error('starttime')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Total Minutes </label>
                                <input type="number" class="form-control" name="minutes" min="0" placeholder="Enter Total Duration"/>
                                @error('minutes')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Total Change <span>(In Percent)</span> </label>
                                <input type="number" step="0.0001" min="0" class="form-control" name="change" min="0" placeholder="Enter Total Change ( % )"/>
                                @error('change')
                                    <span class="text-danger">{{$message}}</span>
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
      </div> <!-- end col-->
  </div>
  <!-- end row -->

</div>
<!-- container -->

</div>
<!-- content -->


@endsection
  

              