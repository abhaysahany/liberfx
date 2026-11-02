@extends('admin.layouts.main')
@section('title', 'Fake Light Level Income Data')
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
                                <li class="breadcrumb-item active" aria-current="page">Fake Light Level Income Data</li>
                            </ol>
                        </nav>
                    </div>
                    <h4 class="page-title">Fake Light Level Income Data</h4>
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
                        <span class="h4">{{ __('Add Fake Light Level Income') }}</span>
                    </div>

                    <div class="card-body px-3">
                        <form action="{{ route('addFakeLightLevelIncome') }}" method="post">
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
                                        <label for="level">Level <span class="text-danger">*</span></label>
                                        <select name="level" id="level" class="form-control">
                                            <option value="">Select Level</option>
                                            @for ($lvl = 1; $lvl <= 20; $lvl++)
                                                <option value="{{ $lvl }}" {{ old('level') == $lvl ? 'selected' : '' }}>Level {{ $lvl }}</option>
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
                                                <option value="{{ $inst }}" {{ old('installment') == $inst ? 'selected' : '' }}>Installment {{ $inst }}</option>
                                            @endfor
                                        </select>
                                        @error('installment')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="amount">Amount ($) <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="amount" name="amount"
                                    value="{{ old('amount') }}" placeholder="Enter $ amount">
                                @error('amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-2">
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
                        <h4>{{ __('Fake Light Level Income Table') }}</h4>
                    </div>
                    <div class="card-body px-3">
                        <div class="responsive" style="overflow: auto">
                            <table id="basic-datatable" class="table nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>{{ __('S.No') }}</th>
                                        <th>{{ __('Member ID') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Level') }}</th>
                                        <th>{{ __('Installment') }}</th>
                                        <th>{{ __('Amount') }}</th>
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
                                            <td>Level {{ $list->level }}</td>
                                            <td>Installment {{ $list->installment }}</td>
                                            <td>${{ number_format($list->amount, 2) }}</td>
                                            <td>
                                                @if ($list->status == 'Paid')
                                                    <span class="badge bg-success p-2">{{ $list->status }}</span>
                                                @else
                                                    <span class="badge bg-danger p-2">{{ $list->status }}</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-info text-white"
                                                    href="{{ url('admin/fake-light-level-income/details/' . $list->id) }}">
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
