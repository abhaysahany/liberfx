@extends('member.layouts.main')
@section('title', 'Wallet Transfer')
@section('container')

    <!--**********************************
                    Content body start
                ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Wallet Transfer</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display min-w850">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Date</th>
                                                <th width="50%">Particular</th>
                                                <th>Add</th>
                                                <th>Deduct</th>
                                                <th>Balance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($passdata as $list)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $list['created_at'] }}</td>
                                                    <td>{{ $list['particular'] }}</td>
                                                    <td>{{ $list['debit'] }}</td>
                                                    <td>{{ $list['credit'] }}</td>
                                                    <td> <label
                                                            class="btn btn-sm btn-primary">{{ $list['balance'] }}</label>
                                                    </td>
                                                </tr>
                                                @php
                                                    $i++;
                                                @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
                    Content body end
                ***********************************-->
@endsection
