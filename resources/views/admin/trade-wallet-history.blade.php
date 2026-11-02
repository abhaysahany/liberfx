@extends('admin.layouts.main')
@section('title','Trade Wallet History')
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
                        <li class="breadcrumb-item active" aria-current="page"><a href="#" style="text-decoration: none">Trade Wallet History</a></li>
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
                <div class="card-header"><h4>{{ __('Trade Wallet History')}}</h4></div>
                <div class="card-body px-3" >
                    <div class="responsive" style="overflow: auto">
                        <table id="basic-datatable" class="table  nowrap w-100" >
                            <thead>
                                <tr>
                                    <th>{{ __('S.No')}}</th>
                                    <th>{{ __('Date')}}</th>
                                    <th>{{ __('Member Id')}}</th>
                                    <th>{{ __('Name')}}</th>
                                    <th>{{ __('Wallet Type')}}</th>
                                    <th>{{ __('Debit')}}</th>
                                    <th>{{ __('Credit')}}</th>
                                    <th>{{ __('Balance')}}</th>
                                    <th>{{ __('Particular')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1;  @endphp
                                @foreach ($passdata as $list )
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{ date('Y-m-d',strtotime($list['created_at']))}}</td>
                                        <td>{{ $list['memberid']}}</td>
                                        <td>{{ getName($list['memberid'])}}</td>
                                        <td>{{$list['walletType']}}</td>
                                        <td>{{$list['debit']}}</td>
                                        <td>{{$list['credit']}}</td>
                                        <td>{{$list['balance']}}</td>
                                        <td>{{$list['particular']}}</td>
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
  

              