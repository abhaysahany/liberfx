@extends('admin.layouts.main')
@section('title', 'View Support Tickets')
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
                            <li class="breadcrumb-item active" aria-current="page"><a href="#" style="text-decoration: none">View Support Tickets</a></li>
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
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-0">Recent Chat</h3>
                        <small class="text-muted">Manage support conversation elegantly</small>
                    </div>
                    <div class="card-header-right">
                        <a href="{{url('admin/support/new-support-ticket')}}" class="btn btn-sm btn-primary rounded-pill px-3">Back</a>
                    </div>
                </div>

                @if(session('createMsg'))
                    <div class="alert alert-success m-3 mb-0 rounded-3">
                        {{session('createMsg')}}
                    </div>
                @endif

                <div class="card-body chat-box scrollable card-300 support-chat">
                    <ul class="chat-list list-unstyled mb-0">
                        @foreach ($tictext as $item)
                            @if ($item['written_by'] == 'Member')
                                <li class="chat-item d-flex align-items-start gap-3 mb-4">
                                    <div class="chat-img flex-shrink-0"><img src="{{asset('uploads/avatar.jpg')}}" alt="user" width="50" class="rounded-circle shadow-sm"></div>
                                    <div class="chat-content">
                                        <h6 class="font-medium mb-2">{{getName($support['memberid'])}}</h6>
                                        <div class="box bg-light-info rounded-3 px-3 py-2 shadow-sm">{{$item['text']}}</div>
                                        <div class="chat-actions d-flex justify-content-start gap-2">
                                            <button type="button"
                                                    class="btn btn-sm btn-outline-danger rounded-pill edit-msg-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editMessageModal"
                                                    data-message-id="{{$item['id']}}"
                                                    data-message-text="{{$item['text']}}">
                                                <i class="fa fa-edit me-1"></i> Edit
                                            </button>
                                        </div>
                                        <small class="text-muted d-block mt-2">{{$item['created_at']}}</small>
                                    </div>
                                </li>
                            @else
                                <li class="odd chat-item d-flex justify-content-end mb-4">
                                    <div class="chat-content position-relative">
                                        <div class="box admin-bubble rounded-3 px-3 py-2 shadow-sm">{{$item['text']}}</div>
                                        <div class="chat-actions mt-2 d-flex justify-content-end gap-2">
                                            <button type="button"
                                                    class="btn btn-sm btn-outline-primary rounded-pill edit-msg-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editMessageModal"
                                                    data-message-id="{{$item['id']}}"
                                                    data-message-text="{{$item['text']}}">
                                                <i class="fa fa-edit me-1"></i> Edit
                                            </button>
                                        </div>
                                        <small class="text-muted d-block mt-2 text-end">{{$item['created_at']}}</small>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="card-footer chat-footer bg-white border-top p-3">
                    <form action="{{route('Ticket')}}" method="post">
                        @csrf
                        <div class="input-wrap d-flex gap-2 align-items-start">
                            <input type="text" placeholder="Type and enter" class="form-control rounded-pill" name="reply">
                            @error('reply')
                                <span class="text-danger d-block mt-2">{{$message}}</span>
                            @enderror
                        </div>
                        <input type="hidden" class="form-control" value="{{$support['ticket_id']}}" name="ticket_id">
                        <button type="submit" class="btn btn-icon btn-theme rounded-circle mt-2"><i class="fa fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- container -->

<!-- Edit Message Modal -->
<div class="modal fade" id="editMessageModal" tabindex="-1" aria-labelledby="editMessageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow-lg">
            <div class="modal-header border-0 pb-0">
                <div>
                    <h5 class="modal-title fw-bold" id="editMessageModalLabel">Edit Admin Message</h5>
                    <p class="text-muted mb-0 small">Update the selected reply with a polished message.</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('editTicketMessage')}}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="message_id" id="messageId">
                    <label class="form-label fw-semibold">Message</label>
                    <textarea class="form-control rounded-3" rows="5" name="message" id="messageText" placeholder="Edit your message here"></textarea>
                    @error('message')
                        <span class="text-danger d-block mt-2">{{$message}}</span>
                    @enderror
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-3">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.support-chat .chat-content { max-width: 78%; }
.support-chat .admin-bubble {
    background: linear-gradient(135deg, #556ee6 0%, #6f42c1 100%);
    color: #fff;
    border: 1px solid rgba(255,255,255,0.2);
}
.support-chat .box {
    word-break: break-word;
    line-height: 1.6;
}
.support-chat .edit-msg-btn {
    opacity: 0.95;
    transition: all 0.2s ease;
}
.support-chat .edit-msg-btn:hover {
    transform: translateY(-1px);
}
.modal-content {
    border-radius: 1rem;
}
.modal-header, .modal-footer {
    background: #f8f9fe;
}
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const buttons = document.querySelectorAll('.edit-msg-btn');
        buttons.forEach(function (button) {
            button.addEventListener('click', function () {
                const messageId = this.getAttribute('data-message-id');
                const messageText = this.getAttribute('data-message-text');
                document.getElementById('messageId').value = messageId;
                document.getElementById('messageText').value = messageText;
            });
        });
    });
</script>

</div>
<!-- content -->
@endsection