@extends('admin.layouts.main')
@section('title','Reno Lending Break')
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
                        <li class="breadcrumb-item active" aria-current="page"><a href="#" style="text-decoration: none">Reno Lending</a></li>
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
               <div class="alert alert-success">{{session('successMsg')}}</div> 
            @endif
            @if (session()->has('ErrorMsg'))
               <div class="alert alert-danger">{{session('ErrorMsg')}}</div> 
            @endif
            <div class="card" style="zoom:90%" >
                <div class="card-header"><h4>{{ __('Reno Lending Break')}}</h4></div>
                <div class="card-body px-3" >
                    <input type="hidden" name="rate" id="rate" value="{{getDeductionRate('break')}}">
                    <form action="{{route('renoBrokenAdmin')}}" method="post">
                        @csrf
                        <label class="form-label">Plan</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="{{$lendData['plan']}}" readonly>
                        </div>
                        <label class="form-label">Invest Amount</label>
                        <div class="input-group mb-3">
                            <input name="amount" type="text" class="form-control" value="{{$lendData['amount']}}" readonly id="amount">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Break Amount</label>
                            <div class="input-group">
                                <input type="number" class="form-control"
                                    placeholder="Enter Amount" name="break_amount" id="break_amount">
                            </div>
                            <span id="brkText" class="text-danger"></span> 
                            @error('break_amount')
                                <span class="text-danger">{{$message}}</span>
                            @enderror    
                        </div>
                        <input type="hidden" name="id" class="form-control"
                                value="{{$lendData['id']}}">
                        <button type="submit" class="btn  btn-primary py-2 fs-5 text-uppercase px-5 mt-4 float-end">
                                    Break Lending</button>       
                        
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
  

              