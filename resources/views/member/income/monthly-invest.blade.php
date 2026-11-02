@extends('member.layouts.main')
@section('title', 'Team Business')
@section('container')
    <style>
        #responsiveTable,
        #responsiveTable_wrapper .dataTables_scrollHeadInner,
        #responsiveTable_wrapper .dataTables_scrollHeadInner table,
        #responsiveTable_wrapper .dataTables_scrollBody table {
            width: 100% !important;
        }

        #responsiveTable thead th,
        #responsiveTable_wrapper .dataTables_scrollHead th,
        #responsiveTable th,
        #responsiveTable td {
            text-align: center;
            vertical-align: middle;
            white-space: nowrap;
        }

        #responsiveTable_wrapper .dataTables_scrollHead th {
            padding-left: 12px;
            padding-right: 12px;
        }
    </style>

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
                                <h4 class="card-title">Team Business & History</h4>
                            </div>
                            <div class="card-body" style="overflow: auto">
                                <ul class="nav nav-pills mb-4 light">
                                    <li class=" nav-item">
                                        <a href="#navpills-1" class="nav-link active" data-bs-toggle="tab"
                                            aria-expanded="false">Current Month</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#navpills-2" class="nav-link" data-bs-toggle="tab"
                                            aria-expanded="false">Monthly History</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="navpills-1" class="tab-pane active">

                                        <div class="table-responsive">
                                            <table class=" table table-hover table-bordered align-middle mb-0 text-center"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Current Year</th>
                                                        <th>Current Month</th>
                                                        <th>{{ $ratio['first'] }} Side Investment</th>
                                                        <th style="text-align-last: center">{{ $ratio['rest'] }} Side Investment
                                                        </th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>{{ date('Y') }}</td>
                                                        <td>{{ date('F') }}</td>
                                                        <td><b>{{ $first_biz }}</b></td>
                                                        <td style="text-align-last: center"><b>{{ $rest_biz }}</b></td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <hr>
                                    </div>
                                    <div id="navpills-2" class="tab-pane">

                                        <div class="table-responsive">
                                            <table id="example3" class="display min-w850"
                                                class="table table-hover align-middle text-center display responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Year</th>
                                                        <th>Month</th>
                                                        <th>Monthly Investment</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $i = 1;
                                                    @endphp
                                                    @foreach ($rewdata as $op_data)
                                                        <tr>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ $op_data['year'] }}</td>
                                                            <td>{{ $op_data['month'] }}</td>
                                                            <td>$ {{ $op_data['team_biz_first'] }}</td>
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
        </div>
    </div>
    <!--**********************************
                                                                                                                                                    Content body end
                                                                                                                                                ***********************************-->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function adjustMonthlyHistoryTable() {
                if (window.jQuery && jQuery.fn.dataTable && jQuery.fn.dataTable.isDataTable('#responsiveTable')) {
                    jQuery('#responsiveTable').DataTable().columns.adjust().responsive.recalc();
                }
            }

            document.querySelector('a[href="#navpills-2"]')?.addEventListener('shown.bs.tab', function() {
                setTimeout(adjustMonthlyHistoryTable, 50);
            });

            setTimeout(adjustMonthlyHistoryTable, 250);
        });
    </script>
@endsection
