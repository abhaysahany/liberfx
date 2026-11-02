@extends('member.layouts.main')
@section('title', 'News')
@section('container')

    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                Content body start
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ***********************************-->
    <div class="content-body news-page">
        <div class="container-fluid">
            <!-- row -->
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="card h-auto news-main-card">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <div class="my-post-content pt-3">
                                        @if (count($news_data) > 0)
                                            @foreach ($news_data as $item)
                                                <div class="profile-uoloaded-post border-bottom-1 pb-3 pt-3 news-post-item">
                                                    <a class="post-title" href="javascript:;">
                                                        <h3>{{ $item['title'] }}</h3>
                                                    </a>
                                                    <ul class="mb-4 post-meta d-flex flex-wrap news-post-meta">
                                                        <li class="post-author me-3">By Admin</li>
                                                        <li class="post-date me-3"><i
                                                                class="far fa-calendar-plus me-2"></i>{{ date('d M Y', strtotime($item['created_at'])) }}
                                                        </li>
                                                    </ul>
                                                    <img src="{{ asset('adm_assets/assets/images/news') }}/{{ $item['image'] }}"
                                                        alt="" class="img-fluid w-100 rounded news-post-image">

                                                    <p class="news-post-desc">{{ $item['description'] }}</p>
                                                </div>
                                            @endforeach
                                        @else
                                            <h4 class="news-empty">No News Available</h4>
                                        @endif

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************  Content body end     ***********************************-->
@endsection
