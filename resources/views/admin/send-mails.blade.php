@extends('admin.layouts.main')
@section('title','Send Mails')
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
                        <li class="breadcrumb-item active" aria-current="page"><a href="#" style="text-decoration: none">Send Mails</a></li>
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
            @if (session()->has('ErrorMsg'))
            <div class="alert alert-danger" role="alert">
                {{session('ErrorMsg')}}
            </div>
            @endif
            <div class="card" style="zoom:90%" >
                <div class="card-header"><h4>{{ __('Send Mails Form')}}</h4></div>
                <div class="card-body px-3" >
                    <div class="responsive" style="overflow: auto">
                        <form action="{{route('InsertMail')}}" method="post">
                            @csrf
                        
                            <div class="form-group mb-3">
                                <label>MemberId</label>
                                <input type="text" name="memberid" class="form-control" id="memberid" placeholder="Enter MemberId"/>
                                @error('memberid')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                <span id="memMsg"></span>
                            </div>
                            <div class="form-group mb-3">
                                <label>Subject</label>
                                <input type="text" name="subject" class="form-control" placeholder="Enter Subject"/>
                                @error('subject')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Title"/>
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Message</label>
                                <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                                @error('message')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                                <input type="hidden" id="csrf" value="{{csrf_token()}}">
                                <button class="btn btn-primary float-end">Send Mail</button>
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

@endsection
  

              