@extends('admin.layouts.main')
@section('title','Level Stat')
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
                        <li class="breadcrumb-item active" aria-current="page"><a href="#" style="text-decoration: none">Level Stat</a></li>
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
            @if (session()->has('delMsg'))
                <div class="alert alert-primary" role="alert">
                    {{session('delMsg')}}
                </div>
            @endif
            <div class="card">
                <div class="card-header"><h3>{{ __('Level Stat Table')}}</h3></div>
                <div class="card-body px-3" style="overflow:auto">
                    <table id="basic-datatable" class="table">
                        <thead>
                            <tr>
                                <th>{{ __('S.No')}}</th>
                                <th>{{ __('Level')}}</th>
                                <th>{{ __('Share')}}</th>
                                <th>{{ __('Directs')}}</th>
                                <th>{{ __('Action')}}</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1;  @endphp
                            @foreach ($data as $list )
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{ $list['level']}}</td>
                                    <td>{{ $list['share']}}</td>
                                    <td>{{ $list['direct']}}</td>
                                        <td>
                                            <div class="text-center">
                                                <a class="btn btn-primary text-white" href="{{url('admin/edit-level-stat')}}/{{$list['id']}}">Edit</a>
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
  <!-- end row -->

</div>
<!-- container -->

</div>
<!-- content -->


@endsection
  

              