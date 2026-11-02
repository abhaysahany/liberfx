@extends('admin.layouts.main')
@section('title','History Change')
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
                        <li class="breadcrumb-item active" aria-current="page"><a href="#" style="text-decoration: none">History Change</a></li>
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
            @if (session()->has('delMsg'))
            <div class="alert alert-primary" role="alert">
                {{session('delMsg')}}
            </div>
        @endif
            <div class="card" style="zoom:90%" >
                <div class="card-header"><h4>{{ __('History Change')}}</h4></div>
                <div class="card-body px-3" >
                    <div class="responsive" style="overflow: auto">
                        <table id="basic-datatable" class="table  nowrap w-100" >
                            <thead>
                                <tr>
                                    <th>{{ __('S.No')}}</th>
                                    <th>{{ __('Coin')}}</th>
                                    <th>{{ __('Starttime')}}</th>
                                    <th>{{ __('Minutes')}}</th>
                                    <th>{{ __('Stoptime')}}</th>
                                    <th>{{ __('Type')}}</th>
                                    <th>{{ __('Price Change')}}</th>
                                    <th class="text-center">{{ __('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1;  @endphp
                                @foreach ($data as $list )
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{ $list['coin']}}</td>
                                        <td>{{ $list['starttime']}}</td>
                                        <td>{{ $list['minutes']}}</td>
                                        <td>{{ $list['stoptime']}}</td>
                                        <td>{{ $list['type']}}</td>
                                        <td>{{ $list['price_change']}}</td>
                                        <td>
                                            <div class="text-center">
                                                <a class="btn btn-danger text-white" href="{{url('admin/change-history/delete')}}/{{$list['id']}}">Delete</a>
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
  

              