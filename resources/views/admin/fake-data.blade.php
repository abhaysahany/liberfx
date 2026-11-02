@extends('admin.layouts.main')
@section('title', 'Fake Data')
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
                                <li class="breadcrumb-item active" aria-current="page"><a href="#"
                                        style="text-decoration: none">Fake Data</a></li>
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
                <div class="col-md-6">
                    @if (session()->has('failedMsg'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('failedMsg') }}
                        </div>
                    @endif
                    @if (session()->has('successMsg'))
                        <div class="alert alert-success" role="alert">
                            {{ session('successMsg') }}
                        </div>
                    @endif
                    <div class="card" style="zoom:90%">
                        <div class="card-header">
                            <span class="h4">{{ __('Fake Lending Details') }}</span><span class="ml-auto mr-0"
                                style="float: right"><a href="{{ url('admin/fake-lending-details') }}"
                                    class="btn btn-sm btn-primary text-white"><i class="uil-list-ul"></i> View Fake Lending Details</a></span>
                        </div>

                        <div class="card-body px-3">
                            <form action="{{ route('addFakeData') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label>Memberid </label>
                                    <input type="text" class="form-control" id="memberid" name="memberid"
                                        placeholder="Enter Memberid">
                                    <span id="memMsg"></span>
                                    @error('memberid')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                <select name="plan_name" id="plan_name" class="form-control">
                                    <option value="">Select Plan</option>
                                    <option value="Core">Core Plan</option>
                                    <option value="Lime">Lime Plan</option>
                                    <option value="Droid">Droid Plan</option>
                                </select>
                                @error('plan_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Amount </label>
                                    <input type="text" class="form-control" name="amount"
                                        placeholder="Enter $ amount to add">
                                    @error('amount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <input type="hidden" id="csrf" value="{{ csrf_token() }}">
                                    <button class="btn btn-primary float-right">Submit</button>
                                </div>
                            </form>
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
