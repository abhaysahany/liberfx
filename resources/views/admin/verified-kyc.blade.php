@extends('admin.layouts.main')
@section('title','Accepted KYC Requests')
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
                        <li class="breadcrumb-item active" aria-current="page"><a href="#" style="text-decoration: none">Accepted KYC Requests</a></li>
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
                <div class="card-header"><h4>{{ __('Accepted KYC Requests Details')}}</h4></div>
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
                                           <img src="{{asset('uploads/avatar.jpg')}}" class="table-user-thumb" alt="" width="45"> 
                                        @else
                                           <img src="{{asset('uploads')}}/{{$list['profile_image']}}" class="table-user-thumb" alt="" width="45">
                                        @endif
                                        </td>
                                        <td>{{ $list['memberid']}}</td>
                                        <td>{{ $list['first_name']}} {{ $list['last_name']}}</td>
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
                                            <div class="table-actions d-flex align-items-center" style="gap: 6px;">
                                                <a class="btn btn-sm btn-warning" style="margin-right: 6px;" href="{{url('admin/KYC/view')}}/{{$list['id']}}"><i class="mdi mdi-eye"></i> View KYC</a>
                                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-toggle="modal" data-bs-target="#rejectModal{{$list['id']}}" data-target="#rejectModal{{$list['id']}}">
                                                    <i class="mdi mdi-close-circle"></i> Reject
                                                </button>
                                            </div>

                                            <!-- Reject Modal for row -->
                                            <div class="modal fade" id="rejectModal{{$list['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form action="{{ route('rejectReason') }}" method="post">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Reject Accepted KYC - {{ $list['memberid'] }}</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" data-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are you sure you want to reject the accepted KYC for <strong>{{ $list['first_name'] }} {{ $list['last_name'] }}</strong> ({{ $list['memberid'] }})?</p>
                                                                <div class="form-group text-start text-left">
                                                                    <label><strong>Reject Reason <span class="text-danger">*</span>:</strong></label>
                                                                    <input type="text" class="form-control" name="reject_reason" placeholder="Enter reason for rejecting KYC" required>
                                                                </div>
                                                                <input type="hidden" name="id" value="{{ $list['id'] }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-danger">Confirm Reject</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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
  

              