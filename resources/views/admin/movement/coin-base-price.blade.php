@extends('admin.layouts.main')
@section('title','Coin Base Price')
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
                        <li class="breadcrumb-item active" aria-current="page"><a href="#" style="text-decoration: none">Coin Base Price</a></li>
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
                <div class="card-header"><h4>{{ __('Coin Base Price Form')}}</h4></div>
                <div class="card-body px-3" >
                    <div class="responsive" style="overflow: auto">
                        <form action="{{route('changeBase')}}" method="post">
                            @csrf
                         
                            <div class="form-group mb-3">
                                <label>BNIX USDT</label>
                                <input type="text" name="bnixusdt" class="form-control" value="{{$coins[1]->base_price}}" />
                                @error('bnixusdt')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>VOXA USDT</label>
                                <input type="text" name="voxausdt" class="form-control" value="{{$coins[0]->base_price}}" />
                                @error('voxausdt')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            
                            <div>
                                <button class="btn btn-primary float-right">Update Price</button>
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
  

              