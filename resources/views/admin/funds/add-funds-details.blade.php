@extends('admin.layouts.main')
@section('title','Funds History')
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
                        <li class="breadcrumb-item active" aria-current="page"><a href="#" style="text-decoration: none">Funds History</a></li>
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
            @if (session()->has('failedMsg'))
            <div class="alert alert-danger" role="alert">
                {{session('failedMsg')}}
            </div>
        @endif
        @if (session()->has('successMsg'))
            <div class="alert alert-success" role="alert">
                {{session('successMsg')}}
            </div>
        @endif
            <div class="card" style="zoom:90%" >
                <div class="card-header"><h4>{{ __('Funds History Table')}}</h4></div>
                <div class="card-body px-3" >
                    <div class="responsive" style="overflow: auto">
                        <table id="basic-datatable" class="table  nowrap w-100" >
                            <thead>
                                <tr>
                                    <th>{{ __('S.No')}}</th>
                                    <th>{{ __('Time')}}</th>
                                    <th>{{ __('Memberid')}}</th>
                                    <th>{{ __('Name')}}</th>
                                    <th>{{ __('OrderId')}}</th>
                                    <th>{{ __('Amount')}}</th>
                                    <th>{{ __('Wallet Type')}}</th>
                                    <th>{{ __('Type')}}</th>
                                    <th>{{ __('Mode')}}</th>
                                    <th>{{ __('Status')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1;  @endphp
                                @foreach ($data as $list )
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{ $list['created_at']}}</td>
                                        <td>{{ $list['memberid']}}</td>
                                        <td>{{ ($list['memberid'])}}</td>
                                        <td>{{ $list['orderid']}}</td>
                                        <td>$ {{ $list['amount']}}</td>
                                        <td>{{ $list['wallet_type']}}</td>
                                        <td>
                                            @if ($list['type'] == 'Add')
                                               <span class="badge bg-primary rounded-pill px-2 py-1">{{ $list['type']}}</span>
                                            @else
                                               <span class="badge bg-danger rounded-pill px-2 py-1">{{ $list['type']}}</span>
                                            @endif
                                        </td>
                                        <td>{{ $list['mode']}}</td>
                                        <td>
                                            <div class="btn btn-success">
                                                {{ $list['status']}}
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
  

              