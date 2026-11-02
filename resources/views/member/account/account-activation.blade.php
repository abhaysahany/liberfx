@extends('member.layouts.main')
@section('title','Account Activation')
@section('container')

	   <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="col-xl-7 col-lg-7 mb-3">
                            @if (session()->has('ActiveMsg'))
                                <div class="alert alert-success" role="alert">
                                    {{session('ActiveMsg')}}
                                </div>
                            @endif
                            @if (session()->has('FailedMsg'))
                                <div class="alert alert-danger" role="alert">
                                    {{session('FailedMsg')}}
                                </div>
                            @endif  
                            <div class="card ">
                                <div class="card-header">
                                    <h4 class="card-title">Account Activation Form</h4>
                                    <p>USDT BEP20</p>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form action="{{route('instantFunds')}}" method="post" enctype="multipart/form-data">
                                            <input type="hidden" id="csrf" value="{{csrf_token()}}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="form-label">Memberid</label>
                                                <input type="text" class="form-control" name="memberid" id="memberid" value="{{$data['memberid']}}" readonly>
                                            </div>

                                            <div class="mb-3">
                                            <label for="exampleInputPassword1">Package</label>
                                            <select class="form-control" name="package" id="package">
                                                <option value="">Select Package</option>
                                                <option value="Starter">Starter Package</option>
                                                <option value="Basic">Basic Package</option>
                                                <option value="Pro">Pro Package</option>
                                                <option value="Advance">Advance Package</option>                       
                                            </select>
                                            @error('package')
                                                    <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Package Value</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-text">$</div>
                                                    <input type="text" class="form-control" name="amount" id="pvalue" placeholder="Select Package & enter amount" class="form-control " >
                                                </div>
                                                <div id="packMsg" class="text-warning small"></div>
                                                <div id="intMsg" class="text-danger small"></div>
                                                @error('package_value')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Transaction Password</label>
                                                <input type="password" class="form-control"  placeholder="Enter Transaction Password" name="txn_password">
                                                @error('txn_password')
                                                      <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3"> 
                                                <input type="hidden" name="memberid" value="{{$data['memberid']}}">
                                                <button class="btn btn-primary btn-rounded btn-block mt-3 float-end" >Import Funds</button>
                                            </div>
                                        </form>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
@endsection	
