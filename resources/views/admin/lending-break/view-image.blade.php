@extends('admin.layouts.main')
@section('title', 'View Image')
@section('container')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item active" aria-current="page"><a href="#"
                                        style="text-decoration: none">View Image</a></li>
                            </ol>
                        </nav>

                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>View Image <a href="{{ url()->previous() }}" class="float-end btn btn-primary fs-5">Back</a>
                        </h3>

                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            @if ($breakData['identity_image'] != '')
                                <img src="{{ asset('uploads') }}/{{ $breakData['identity_image'] }}" class=""
                                    alt="" width="200" height="240">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
