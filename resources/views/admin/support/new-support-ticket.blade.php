@extends('admin.layouts.main')
@section('title','New Support Ticket')
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
                        <li class="breadcrumb-item active" aria-current="page"><a href="#" style="text-decoration: none">New Support Ticket</a></li>
                    </ol>
                </nav>
                    
              </div>
              <h4 class="page-title">Dashboard</h4>
          </div>
      </div>
  </div>
  <!-- end page title -->

  <div class="row">
    <div class="col-md-12">
        @if (session()->has('wMessage'))
           <div class="alert alert-primary">{{session('wMessage')}}</div> 
        @endif
        <div class="card">
            <div class="card-header"><h3>{{ __('New Support Tickets')}}</h3></div>
            <div class="card-body px-3" style="overflow: auto">
                <table id="basic-datatable" class="table">
                    <thead>
                        <tr>
                            <th>{{ __('S.No')}}</th>
                            <th>{{ __('Request Date')}}</th>
                            <th>{{ __('Ticket ID')}}</th>
                            <th>{{ __('Memberid')}}</th>
                            <th>{{ __('Name')}}</th>
                            <th>{{ __('Subject')}}</th>
                            <th>{{ __('Action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1;  @endphp
                        @foreach ($support as $list )
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{date('d-M-Y',strtotime($list['created_at']))}}</td>
                                <td>{{ $list['ticket_id']}}</td>
                                <td>{{ $list['memberid']}}</td>
                                <td>{{ getName($list['memberid'])}}</td>
                                <td>{{ $list['subject']}}</td>
                                <td>
                                    <div >
                                        <a href="{{url('admin/support/view-support-ticket')}}/{{$list['id']}}" class="btn btn-sm btn-primary ">View</a>
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

</div>
<!-- container -->

</div>
<!-- content -->


@endsection
  

              