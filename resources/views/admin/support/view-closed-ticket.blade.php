@extends('admin.layouts.main') 
@section('title', 'View Closed Tickets')
@section('container')
    <div class="container-fluid">
          <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item active" aria-current="page"><a href="#" style="text-decoration: none">Closed Support Tickets</a></li>
                            </ol>
                        </nav>
                            
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Closed Chat</h3>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                <li><i class="ik ik-minus minimize-card"></i></li>
                                <li><i class="ik ik-x close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body chat-box scrollable card-300" >
                        <ul class="chat-list">
                            @foreach ($tictext as $item)
                                @if ($item['written_by'] == 'Member')
                                    <li class="chat-item">
                                        <div class="chat-img"><img src="{{asset('uploads/avatar.jpg')}}" alt="user" width="50"></div>
                                        <div class="chat-content">
                                            <h6 class="font-medium">{{getName($support['memberid'])}}</h6>
                                            <div class="box bg-light-info">{{$item['text']}}</div>
                                        </div>
                                        <div class="chat-time">{{$item['created_at']}}</div>
                                    </li>
                                @else
                                    <li class="odd chat-item">
                                        <div class="chat-content">
                                            <div class="box bg-light-inverse">{{$item['text']}}</div>
                                            <br>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                            
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    
        
    </div>
@endsection