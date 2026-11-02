@extends('admin.layouts.main')
@section('title', 'Fake Reward Income Data')
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
                                <li class="breadcrumb-item"><a href="javascript:void(0)" style="text-decoration: none">Fake Data</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Fake Reward Income Data</li>
                            </ol>
                        </nav>
                    </div>
                    <h4 class="page-title">Fake Reward Income Data</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-5">
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
                        <span class="h4">{{ __('Add Fake Reward Income') }}</span>
                    </div>

                    <div class="card-body px-3">
                        <form action="{{ route('addFakeRewardIncome') }}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="memberid">Member ID <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="memberid" name="memberid"
                                    value="{{ old('memberid') }}" placeholder="Enter Member ID">
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
                                                <option value="{{ $rk }}" {{ old('rank') == $rk ? 'selected' : '' }}>{{ $rk }}</option>
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
                                            $currentMonth = date('M');
                                        @endphp
                                        <select name="month" id="month" class="form-control">
                                            <option value="">Select Month</option>
                                            @foreach ($months as $m)
                                                <option value="{{ $m }}" {{ old('month', $currentMonth) == $m ? 'selected' : '' }}>{{ $m }}</option>
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
                                            value="{{ old('amount') }}" placeholder="Enter $ amount">
                                        @error('amount')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="pay_date">Pay Date <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" id="pay_date" name="pay_date"
                                            value="{{ old('pay_date', date('Y-m-d')) }}">
                                        @error('pay_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div>
                                <input type="hidden" id="csrf" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-primary float-right">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <div class="card" style="zoom:90%">
                    <div class="card-header">
                        <h4>{{ __('Fake Reward Income Table') }}</h4>
                    </div>
                    <div class="card-body px-3">
                        <div class="responsive" style="overflow: auto">
                            <table id="basic-datatable" class="table nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>{{ __('S.No') }}</th>
                                        <th>{{ __('Member ID') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Rank') }}</th>
                                        <th>{{ __('Month') }}</th>
                                        <th>{{ __('Amount') }}</th>
                                        <th>{{ __('Pay Date') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th class="text-center">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($fakeData as $list)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $list->memberid }}</td>
                                            <td>{{ getName($list->memberid) }}</td>
                                            <td>{{ $list->rank }}</td>
                                            <td>{{ $list->month }}</td>
                                            <td>${{ number_format($list->amount, 2) }}</td>
                                            <td>{{ !empty($list->pay_date) ? date('d-m-Y', strtotime($list->pay_date)) : 'N/A' }}</td>
                                            <td>
                                                @if ($list->status == 'Paid')
                                                    <span class="badge bg-success p-2">{{ $list->status }}</span>
                                                @else
                                                    <span class="badge bg-danger p-2">{{ $list->status }}</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-info text-white"
                                                    href="{{ url('admin/fake-reward-income/details/' . $list->id) }}">
                                                    <i class="uil-eye"></i> Details
                                                </a>
                                            </td>
                                        </tr>
                                        @php $i++; @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div>
    <!-- container -->
@endsection
