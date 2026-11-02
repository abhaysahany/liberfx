@extends('admin.layouts.main')
@section('title', 'Add On Data')
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
                                        style="text-decoration: none">Add On Data</a></li>
                            </ol>
                        </nav>

                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            {{-- <div class="col-12"> --}}
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
                        <span class="h4">{{ __('Add On Data') }}</span><span class="ml-auto mr-0" style="float: right">
                        </span>
                    </div>

                    <div class="card-body px-3">
                        <form action="{{ route('AddonDataInsert') }}" method="post" enctype="multipart/form-data">
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
                                <label>Team </label>
                                <input type="text" class="form-control" name="team" placeholder="Enter Team">
                                @error('team')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Rewards </label>
                                <input type="text" class="form-control" name="reward" placeholder="Enter Rewards">
                                @error('reward')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Level </label>
                                <input type="text" class="form-control" name="level" placeholder="Enter Level">
                                @error('level')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Lending </label>
                                <input type="text" class="form-control" name="lending" placeholder="Enter Lending">
                                @error('lending')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Direct </label>
                                <input type="text" class="form-control" name="direct" placeholder="Enter Direct">
                                @error('direct')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Withdrawl</label>
                                <input type="text" name="withdrawl" class="form-control" placeholder="Enter Withdrawl" />
                                @error('withdrawl')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Fund Wallet</label>
                                <input type="text" name="fund_wallet" class="form-control"
                                    placeholder="Enter Fund Balance" />
                                @error('fund_wallet')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Core Investment</label>
                                <input type="text" name="core_investment" class="form-control"
                                    placeholder="Enter Core Investment" />
                                @error('core_investment')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Lime Investment</label>
                                <input type="text" name="lime_investment" class="form-control"
                                    placeholder="Enter Lime Investment" />
                                @error('lime_investment')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Droid Investment</label>
                                <input type="text" name="droid_investment" class="form-control"
                                    placeholder="Enter Droid Investment" />
                                @error('droid_investment')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Total Investment</label>
                                <input type="text" name="total_investment" class="form-control"
                                    placeholder="Enter Total Investment" />
                                @error('total_investment')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Bonus Income</label>
                                <input type="text" name="bonus_income" class="form-control"
                                    placeholder="Enter Bonus Income" />
                                @error('bonus_income')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Light Level Income</label>
                                <input type="text" name="light_level_income" class="form-control"
                                    placeholder="Enter Light Level Income" />
                                @error('light_level_income')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Total Income</label>
                                <input type="text" name="total_income" class="form-control"
                                    placeholder="Enter Total Income" />
                                @error('total_income')
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
            <div class="col-md-7">
                <div class="card" style="zoom:90%">
                    <div class="card-header">
                        <h4>{{ __('Add On Data Table') }}</h4>
                    </div>
                    <div class="card-body px-3">
                        <div class="responsive" style="overflow: auto">
                            <table id="basic-datatable" class="table  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>{{ __('S.No') }}</th>
                                        <th>{{ __('Memberid') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Team') }}</th>
                                        <th>{{ __('Rewards') }}</th>
                                        <th>{{ __('Level') }}</th>
                                        <th>{{ __('Lending') }}</th>
                                        <th>{{ __('Direct') }}</th>
                                        <th>{{ __('Withdrawl') }}</th>
                                        <th>{{ __('Fund Wallet') }}</th>
                                        <th>{{ __('Core Investment') }}</th>
                                        <th>{{ __('Lime Investment') }}</th>
                                        <th>{{ __('Droid Investment') }}</th>
                                        <th>{{ __('Total Investment') }}</th>
                                        <th>{{ __('Bonus Income') }}</th>
                                        <th>{{ __('Light Level Income') }}</th>
                                        <th>{{ __('Total Income') }}</th>
                                        <th class="text-center">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1;  @endphp
                                    @foreach ($fakeData as $list)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $list['memberid'] }}</td>
                                            <td>{{ getName($list['memberid']) }}</td>
                                            <td>{{ $list['team'] }}</td>
                                            <td>{{ $list['rewards'] }}</td>
                                            <td>{{ $list['level'] }}</td>
                                            <td>{{ $list['lending'] }}</td>
                                            <td>{{ $list['direct'] }}</td>
                                            <td>{{ $list['withdrawl'] }}</td>
                                            <td>{{ $list['fund_wallet'] }}</td>
                                            <td>{{ $list['core_invest'] }}</td>
                                            <td>{{ $list['lime_invest'] }}</td>
                                            <td>{{ $list['droid_invest'] }}</td>
                                            <td>{{ $list['total_invest'] }}</td>
                                            <td>{{ $list['bonus_inc'] }}</td>
                                            <td>{{ $list['light_lvl_inc'] }}</td>
                                            <td>{{ $list['total_inc'] }}</td>
                                            <td>
                                                <div class="text-center">
                                                    <a class="btn btn-danger text-white"
                                                        href="{{ url('admin/addon-data/edit') }}/{{ $list['id'] }}">Edit</a>
                                                </div>
                                            </td>
                                        </tr>
                                        @php $i++;  @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- end col-->
                {{-- </div>  --}}

            </div>
            <!-- end row -->

        </div>
        <!-- container -->

    </div>
    <!-- content -->


@endsection
