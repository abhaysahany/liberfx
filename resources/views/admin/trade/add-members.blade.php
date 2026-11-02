@extends('admin.layouts.main')
@section('title', 'Add Members')
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
                                        style="text-decoration: none">Add Members</a></li>
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
                <div class="col-md-12">
                    @if (session()->has('successMsg'))
                        <div class="alert alert-success">{{ session('successMsg') }}</div>
                    @endif
                    @if (session()->has('failedMsg'))
                        <div class="alert alert-danger">{{ session('failedMsg') }}</div>
                    @endif
                    <div class="card" style="zoom:90%">
                        <div class="card-header">
                            <h4>{{ __('Add Members') }}</h4>
                        </div>
                        <form action="{{ route('addCopyMembers') }}" method="post">
                            @csrf
                            <div class="card-body px-3">
                                <div class="responsive" style="overflow: auto">
                                    <table id="basic-datatable" class="table  nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" name="checkAll" class="checkAll me-2"> All </th>
                                                <th>{{ __('S.No') }}</th>
                                                <th>{{ __('Memberid') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i = 1;  @endphp
                                            @foreach ($members as $list)
                                                @if (checkAddedMember($list['memberid'], $tradeId) > 0)
                                                @else
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="memberid[]"
                                                                value="{{ $list['memberid'] }}">
                                                        </td>
                                                        <td>{{ $i }}</td>
                                                        <td>{{ $list['memberid'] }}</td>
                                                    </tr>
                                                @endif

                                                @php $i++;  @endphp
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td><input type="hidden" name="trade_id" value="{{ $tradeId }}"></td>
                                                <td colspan="3"><button class="btn btn-primary float-end">Add
                                                        Members</button></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </form>
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
