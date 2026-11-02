@extends('admin.layouts.main')
@section('title','Deduction')
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
                        <li class="breadcrumb-item active" aria-current="page"><a href="#" style="text-decoration: none">Deduction</a></li>
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
                <div class="card-header"><h4>{{ __('Deductions Form')}}</h4></div>
                <div class="card-body px-3" >
                    <div class="responsive" style="overflow: auto">
                        <form action="{{route('dedtion')}}" method="post">
                            @csrf
                        
                            <div class="form-group mb-3">
                                <label>Withdrawal Deduction</label>
                                <input type="text" name="rate" class="form-control" value="{{$data['rate']}}"/>
                                @error('rate')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>P2P Deduction</label>
                                <input type="text" name="p2p" class="form-control" value="{{$data['p2p']}}"/>
                                @error('p2p')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Member Lending Deduction</label>
                                <input type="text" name="lending" class="form-control" value="{{$data['lending']}}"/>
                                @error('lending')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Lending Break Deduction</label>
                                <input type="text" name="break" class="form-control" value="{{$data['break']}}"/>
                                @error('break')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Lending Break</label>
                                <select name="lending_break_status" class="form-control">
                                    <option value="1" @selected($data['lending_break_status'])>On</option>
                                    <option value="0" @selected(!$data['lending_break_status'])>Off</option>
                                </select>
                            </div>
                            <div>
                                <button class="btn btn-primary float-right">Update Deduction Rate</button>
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
  
