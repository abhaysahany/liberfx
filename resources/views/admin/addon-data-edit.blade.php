@extends('admin.layouts.main')
@section('title', 'Edit Add On Data')
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
                                        style="text-decoration: none">Edit Add On Data</a></li>
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
                        <div class="card-header pt-3">
                            <h4 class="d-inline">{{ __('Edit Add On Data') }}</h4>
                            <a href="{{ url('admin/addon-data') }}" class="btn btn-sm btn-primary float-end">Back</a>
                        </div>

                        <div class="card-body px-3">
                            <form action="{{ route('AddonDataUpdate') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label>Memberid </label>
                                    <input type="text" class="form-control" id="memberid" name="memberid"
                                        value="{{ $data['memberid'] }}">
                                    <span id="memMsg"></span>
                                    @error('memberid')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Team </label>
                                    <input type="text" class="form-control" name="team" value="{{ $data['team'] }}">
                                    @error('team')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Rewards </label>
                                    <input type="text" class="form-control" name="reward"
                                        value="{{ $data['rewards'] }}">
                                    @error('reward')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Level </label>
                                    <input type="text" class="form-control" name="level" value="{{ $data['level'] }}">
                                    @error('level')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Lending </label>
                                    <input type="text" class="form-control" name="lending"
                                        value="{{ $data['lending'] }}">
                                    @error('lending')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Direct </label>
                                    <input type="text" class="form-control" name="direct"
                                        value="{{ $data['direct'] }}">
                                    @error('direct')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Withdrawl</label>
                                    <input type="text" name="withdrawl" class="form-control"
                                        value="{{ $data['withdrawl'] }}" />
                                    @error('withdrawl')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Fund Wallet</label>
                                    <input type="text" name="fund_wallet" class="form-control" value="{{ $data['fund_wallet'] }}"
                                        placeholder="Enter Fund Balance" />
                                    @error('fund_wallet')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Core Investment</label>
                                    <input type="text" name="core_investment" class="form-control"
                                        placeholder="Enter Core Investment" value="{{$data['core_invest']}}"/>
                                    @error('core_investment')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Lime Investment</label>
                                    <input type="text" name="lime_investment" class="form-control"
                                        placeholder="Enter Lime Investment" value="{{$data['lime_invest']}}" />
                                    @error('lime_investment')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Droid Investment</label>
                                    <input type="text" name="droid_investment" class="form-control"
                                        placeholder="Enter Droid Investment" value="{{$data['droid_invest']}}"/>
                                    @error('droid_investment')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Total Investment</label>
                                    <input type="text" name="total_investment" class="form-control"
                                        placeholder="Enter Total Investment" value="{{$data['total_invest']}}" />
                                    @error('total_investment')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Bonus Income</label>
                                    <input type="text" name="bonus_income" class="form-control"
                                        placeholder="Enter Bonus Income" value="{{$data['bonus_inc']}}" />
                                    @error('bonus_income')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Light Level Income</label>
                                    <input type="text" name="light_level_income" class="form-control"
                                        placeholder="Enter Light Level Income" value="{{$data['light_lvl_inc']}}"/>
                                    @error('light_level_income')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Total Income</label>
                                    <input type="text" name="total_income" class="form-control"
                                        placeholder="Enter Total Income" value="{{$data['total_inc']}}"/>
                                    @error('total_income')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <input type="hidden" name="id" value="{{ $data['id'] }}">
                                    <button class="btn btn-primary float-right">Submit</button>
                                </div>
                            </form>
                        </div>
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
