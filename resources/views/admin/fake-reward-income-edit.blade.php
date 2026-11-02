@extends('admin.layouts.main')
@section('title', 'Edit Fake Reward Income')
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
                                <li class="breadcrumb-item"><a href="{{ url('admin/fake-reward-income') }}" style="text-decoration: none">Fake Reward Income Data</a></li>
                                <li class="breadcrumb-item"><a href="{{ url('admin/fake-reward-income/details/' . $data->id) }}" style="text-decoration: none">Details</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit</li>
                            </ol>
                        </nav>
                    </div>
                    <h4 class="page-title">Edit Fake Reward Income</h4>
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
                        <span class="h4">{{ __('Edit Fake Reward Income Record') }} #{{ $data->id }}</span>
                        <a href="{{ url('admin/fake-reward-income/details/' . $data->id) }}" class="btn btn-sm btn-secondary">
                            <i class="uil-arrow-left"></i> Cancel
                        </a>
                    </div>

                    <div class="card-body px-4 py-3">
                        <form action="{{ route('updateFakeRewardIncome') }}" method="post">
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
                                        <label for="rank">Rank <span class="text-danger">*</span></label>
                                        <select name="rank" id="rank" class="form-control">
                                            <option value="">Select Rank</option>
                                            @php
                                                $ranks = [
                                                    'Basic', 'Start', 'Silver', 'Gold', 'Platinum',
                                                    'Pearl', 'Ruby', 'Sapphire', 'Emerald', 'Diamond',
                                                    'Crown', 'Prince', 'Imperial Star', 'Imperial Moon',
                                                    'Imperial king', 'Ace Ambassador', 'Star Ambassador',
                                                    'Royal Ambassador', 'King Club', 'Universe Club'
                                                ];
                                            @endphp
                                            @foreach ($ranks as $rk)
                                                <option value="{{ $rk }}" {{ old('rank', $data->rank) == $rk ? 'selected' : '' }}>{{ $rk }}</option>
                                            @endforeach
                                        </select>
                                        @error('rank')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="month">Month <span class="text-danger">*</span></label>
                                        @php
                                            $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                                        @endphp
                                        <select name="month" id="month" class="form-control">
                                            <option value="">Select Month</option>
                                            @foreach ($months as $m)
                                                <option value="{{ $m }}" {{ old('month', $data->month) == $m ? 'selected' : '' }}>{{ $m }}</option>
                                            @endforeach
                                        </select>
                                        @error('month')
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
                                            value="{{ old('created_at', !empty($data->created_at) ? date('Y-m-d', strtotime($data->created_at)) : date('Y-m-d')) }}">
                                        @error('date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <input type="hidden" id="csrf" value="{{ csrf_token() }}">
                                <a href="{{ url('admin/fake-reward-income/details/' . $data->id) }}" class="btn btn-secondary">Cancel</a>
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
