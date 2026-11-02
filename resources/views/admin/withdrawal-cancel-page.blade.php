@extends('admin.layouts.main')
@section('title','Withdrawal Cancellation Form')
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
                        <li class="breadcrumb-item active" aria-current="page"><a href="#" style="text-decoration: none">Withdrawal Cancellation Form</a></li>
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
                <div class="card-header"><h4>{{ __('Withdrawal Cancellation Form')}}</h4></div>
                <div class="card-body px-3" >
                    <div class="responsive" style="overflow: auto">
                        <form action="{{route('withdrawalCancel')}}" method="post">
                            @csrf
                        
                            <div class="form-group mb-3">
                                <label>Memberid</label>
                                <input type="text" name="memberid" class="form-control" value="{{$data['memberid']}}" readonly/>
                                @error('memberid')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Amount</label>
                                <input type="text" name="amount" class="form-control" value="{{$data['gross_amount']}}" readonly/>
                                @error('amount')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Reason</label>
                                <input type="text" name="reason" class="form-control" placeholder="Enter Reason"/>
                                @error('reason')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                                <input type="hidden" name="id" class="form-control" value="{{$data['id']}}" readonly/>
                                <button class="btn btn-danger float-right">Cancel Request</button>
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
  

              