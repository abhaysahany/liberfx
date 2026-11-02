@extends('admin.layouts.main')
@section('title', 'Edit Fake Light Level Income')
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
                                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}" style="text-decoration: none">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ url('admin/fake-light-level-income') }}" style="text-decoration: none">Fake Light Level Income Data</a></li>
                                <li class="breadcrumb-item"><a href="{{ url('admin/fake-light-level-income/details/' . $data->id) }}" style="text-decoration: none">Details</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit</li>
                            </ol>
                        </nav>
                    </div>
                    <h4 class="page-title">Edit Fake Light Level Income</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-6 mx-auto">
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

                <div class="card" style="zoom:95%">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="h4">{{ __('Edit Fake Light Level Income Record') }} #{{ $data->id }}</span>
                        <a href="{{ url('admin/fake-light-level-income/details/' . $data->id) }}" class="btn btn-sm btn-secondary">
                            <i class="uil-arrow-left"></i> Cancel
                        </a>
                    </div>

                    <div class="card-body px-4 py-3">
                        <form action="{{ route('updateFakeLightLevelIncome') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id }}">

                            <div class="form-group mb-3">
                                <label for="memberid">Member ID <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="memberid" name="memberid"
                                    value="{{ old('memberid', $data->memberid) }}" placeholder="Enter Member ID">
                                <span id="memMsg"></span>
                                @error('memberid')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="level">Level <span class="text-danger">*</span></label>
                                        <select name="level" id="level" class="form-control">
                                            <option value="">Select Level</option>
                                            @for ($lvl = 1; $lvl <= 20; $lvl++)
                                                <option value="{{ $lvl }}" {{ old('level', $data->level) == $lvl ? 'selected' : '' }}>Level {{ $lvl }}</option>
                                            @endfor
                                        </select>
                                        @error('level')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="installment">Installment <span class="text-danger">*</span></label>
                                        <select name="installment" id="installment" class="form-control">
                                            <option value="">Select Installment</option>
                                            @for ($inst = 1; $inst <= 6; $inst++)
                                                <option value="{{ $inst }}" {{ old('installment', $data->installment) == $inst ? 'selected' : '' }}>Installment {{ $inst }}</option>
                                            @endfor
                                        </select>
                                        @error('installment')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="amount">Amount ($) <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="amount" name="amount"
                                            value="{{ old('amount', $data->amount) }}" placeholder="Enter $ amount">
                                        @error('amount')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="date">Date <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" id="date" name="date"
                                            value="{{ old('date', !empty($data->created_at) ? date('Y-m-d', strtotime($data->created_at)) : date('Y-m-d')) }}">
                                        @error('date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <input type="hidden" id="csrf" value="{{ csrf_token() }}">
                                <a href="{{ url('admin/fake-light-level-income/details/' . $data->id) }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-success">Update Record</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div>
    <!-- container -->
@endsection
