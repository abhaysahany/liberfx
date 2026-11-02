@extends('admin.layouts.main')
@section('title','New KYC Requests')
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
                        <li class="breadcrumb-item active" aria-current="page"><a href="#" style="text-decoration: none">New KYC Requests</a></li>
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
        <div class="col-md-12">
            @if (session()->has('kycMesg'))
            <div class="alert alert-primary">{{session('kycMesg')}}</div> 
         @endif
            <div class="card" style="zoom:90%" >
                <div class="card-header"><h4>{{ __('New KYC Requests Details')}}</h4></div>
                <div class="card-body px-3" >
                    <div class="responsive" style="overflow: auto">
                        <table id="basic-datatable" class="table  nowrap w-100" >
                            <thead>
                                <tr>
                                    <th>{{ __('S.No')}}</th>
                                    <th>{{ __('Avatar')}}</th>
                                    <th>{{ __('Member Id')}}</th>
                                    <th>{{ __('Name')}}</th>
                                    <th>{{ __('Email')}}</th>
                                    <th>{{ __('Mobile')}}</th>
                                    <th>{{ __('Sponsor Id')}}</th>
                                    <th>{{ __('Status')}}</th>
                                    <th>{{ __('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1;  @endphp
                                @foreach ($data as $list )
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>
                                        @if ($list['profile_image']=='')
                                           <img src="{{asset('uploads/avatar.jpg')}}" class="table-user-thumb" alt="Profile Image" width="45"> 
                                        @else
                                           <img src="{{asset('uploads')}}/{{$list['profile_image']}}" class="table-user-thumb" alt="Profile Image" width="45">
                                        @endif
                                        </td>
                                        <td>{{ $list['memberid']}}</td>
                                        <td>{{ $list['first_name'].' '.$list['last_name']}}</td>
                                        <td>{{ $list['email']}}</td>
                                        <td>{{ $list['mobile']}}</td>
                                        <td>{{ $list['sponsorid']}}</td>
                                        <td>
                                            @if ($list['status'] == 'Active')
                                               <button class="btn btn-primary">{{$list['status']}}</button>
                                            @endif
                                            @if ($list['status'] == 'Deactive')
                                               <button class="btn btn-danger">{{$list['status']}}</button>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-warning" href="{{url('admin/KYC/view')}}/{{$list['id']}}"><i class="ik ik-eye"></i> View KYC</a>
                                        </td>
                                    </tr>
                                    @php $i++;  @endphp
                                @endforeach
                            </tbody>
                        </table>
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
  

              