@extends('member.layouts.main')
@section('title', 'Account Details')
@section('container')

    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        Content body start
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="col-xl-7 col-lg-7 mb-3">
                        @if (session()->has('successMsg'))
                            <div class="alert alert-success" role="alert">
                                {{ session('successMsg') }}
                            </div>
                        @endif
                        @if (session()->has('failedMsg'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('failedMsg') }}
                            </div>
                        @endif
                        <div class="card ">
                            <div class="card-header">
                                <h4 class="card-title">Account Details Form</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('insertAccount') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="memberid">Memberid</label>
                                            <input type="text" class="form-control" name="memberid" id="memberid"
                                                value="{{ $data['memberid'] }}" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="broker_name">Broker Name</label>
                                            <input type="text" class="form-control" name="broker_name" id="broker_name"
                                                placeholder="Enter Broker Name">
                                            @error('broker_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="broker_name">Server Name</label>
                                            <input type="text" class="form-control" name="server_name" id="server_name"
                                                placeholder="Enter Server Name">
                                            @error('server_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Account No.</label>
                                            <input type="text" class="form-control" placeholder="Enter Account Number"
                                                name="account_no">
                                            @error('account_no')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" placeholder="Enter Password"
                                                name="password">
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <input type="hidden" name="memberid" value="{{ $data['memberid'] }}">
                                            <button class="btn btn-primary btn-rounded btn-block mt-3 float-end">Submit
                                                Details</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Account Detail History</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Date</th>
                                                <th>Broker Name</th>
                                                <th>Server Name</th>
                                                <th>Account No</th>
                                                <th>Password</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($accountData)
                                                <tr>
                                                    <td>1</td>
                                                    <td>{{ $accountData->created_at }}</td>
                                                    <td>{{ $accountData->broker_name }}</td>
                                                    <td>{{ $accountData->server_name }}</td>
                                                    <td>{{ $accountData->account_no }}</td>
                                                    <td>{{ $accountData->password }}</td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td colspan="6" class="text-center">No Data Found</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Account Detail History</h4>
                            </div>
                            <div class="card-body">
                                <table id="datatable" class="display responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Date</th>
                                            <th>Broker Name</th>
                                            <th>Server Name</th>
                                            <th>Account No</th>
                                            <th>Password</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($accountData as $list)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $list['created_at'] }}</td>
                                                <td>{{ $list['broker_name'] }}</td>
                                                <td>{{ $list['server_name'] }}</td>
                                                <td>{{ $list['account_no'] }}</td>
                                                <td>{{ $list['password'] }}</td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        Content body end
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ***********************************-->
@endsection
