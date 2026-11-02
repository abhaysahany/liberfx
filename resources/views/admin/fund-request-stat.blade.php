@extends('admin.layouts.main')
@section('title','Fund Request Stat')
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
                        <li class="breadcrumb-item active" aria-current="page"><a href="#" style="text-decoration: none">Fund Request Stat</a></li>
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
                <div class="card-header"><h3>{{ __('Fund Request Stat Table')}}</h3></div>
                <div class="card-body px-3" style="overflow:auto">
                    <table id="basic-datatable" class="table">
                        <thead>
                            <tr>
                                <th>{{ __('S.No')}}</th>
                                <th>{{ __('Image')}}</th>
                                <th>{{ __('Coin')}}</th>
                                <th>{{ __('Address')}}</th>
                                <th>{{ __('Action')}}</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1;  @endphp
                            @foreach ($statData as $list )
                                <tr>
                                    <td>{{$i}}</td>
                                    <td><img src="{{asset('coin-stat')}}/{{$list['image']}}" class="img-fluid avatar mx-1" alt="coin-image" width="80"></td>
                                    <td>{{ $list['coin']}}</td>
                                    <td>{{ $list['address']}}</td>
                                        <td>
                                            <div class="text-center">
                                                <a class="btn btn-primary text-white" href="{{url('admin/edit-fundreq-stat')}}/{{$list['id']}}">Edit</a>
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
  

              