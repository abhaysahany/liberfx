@extends('admin.layouts.main')
@section('title', 'Welcome Image')
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
                      <li class="breadcrumb-item active" aria-current="page"><a href="#" style="text-decoration: none">Welcome Image</a></li>
                  </ol>
              </nav>
                  
            </div>
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
  <div class="col-md-5">
      @if (session()->has('uploadMsg'))
      <div class="alert alert-primary" role="alert">
          {{session('uploadMsg')}}
      </div>
      @endif
      <div class="card" style="zoom:90%" >
          <div class="card-header"><h4>{{ __('Welcome Images Form')}}</h4></div>
          <div class="card-body px-3" >
              <div class="responsive" style="overflow: auto">
                  <form action="{{route('acheivImage')}}" method="post" enctype="multipart/form-data">
                      @csrf
                  
                      <div class="form-group mb-3">
                          <label>Rank</label>
                          <input type="number" class="form-control" name="rank" placeholder="Enter Image Rank">
                          @error('rank')
                              <span class="text-danger">{{$message}}</span>
                          @enderror
                      </div>
                      
                      <div class="form-group mb-3">
                        <label>Title </label>
                        <input type="text" class="form-control" name="title" placeholder="Enter Title">
                        @error('title')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                      <div class="form-group mb-3">
                        <label>Image </label>
                            {{-- <input type="file" name="image" class="file-upload-default" > --}}
                            <div class="input-group col-xs-12">
                                <input type="file" name="image" class="form-control file-upload-default" placeholder="Upload Image" type="button">
                                <span class="input-group-append">
                                {{-- <button class="file-upload-browse btn btn-primary" type="button">{{ __('Upload')}}</button> --}}
                                </span>
                            </div>
                            @error('image')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                      </div>
                      <div>
                          <button class="btn btn-primary float-right">Submit</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
  <div class="col-md-7">
      @if (session()->has('delMsg'))
      <div class="alert alert-primary" role="alert">
          {{session('delMsg')}}
      </div>
     @endif
      <div class="card" style="zoom:90%" >
          <div class="card-header"><h4>{{ __('Welcome Image Table')}}</h4></div>
          <div class="card-body px-3" >
              <div class="responsive" style="overflow: auto">
                  <table id="basic-datatable" class="table  nowrap w-100" >
                      <thead>
                          <tr>
                            <th>{{ __('S.No')}}</th>
                            <th>{{ __('Title')}}</th>
                            <th>{{ __('Rank')}}</th>
                            <th>{{ __('Image')}}</th>
                            <th class="text-center">{{ __('Action')}}</th>
                          </tr>
                      </thead>
                      <tbody>
                          @php $i = 1;  @endphp
                          @foreach ($data as $list )
                              <tr>
                                <td>{{$i}}</td>
                                <td>{{ $list['rank']}}</td>
                                <td>{{ $list['title']}}</td>
                                <td><img src="{{asset('uploads')}}/{{$list['image']}}" class="" alt="" width="50" height="60">
                                </td>
                                  <td>
                                      <div class="text-center">
                                          <a class="btn btn-danger text-white" href="{{url('admin/achv-image/delete')}}/{{$list['id']}}">Delete</a>
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


@endsection
  

              