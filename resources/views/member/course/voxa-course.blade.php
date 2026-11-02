@extends('member.layouts.main')
@section('title', 'Course Buy')
@section('container')

    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    Content body start
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ***********************************-->
    <div class="content-body voxa-course-page">
        <!-- row -->
        <div class="container-fluid">
            <!-- Row -->
            <div class="row g-4">
                @foreach ($courses as $item)
                    <div class="col-xl-4 col-lg-6">
                        <a href="{{ url('member/course-buy') }}/{{ $item['id'] }}" class="course-link-card">
                            <div class="card voxa-course-card">
                                <div class="card-body">
                                    <div class="profile-blog">
                                        <h5 class="text-primary course-badge-label">Liberfx Course</h5>
                                        <img src="{{ asset('adm_assets/assets/images/courses') }}/{{ $item['image'] }}"
                                            alt="" class="mt-4 mb-4 rounded voxa-course-image">
                                        <h3 class="course-title"><a>{{ $item['course'] }}</a></h3>
                                        <p class="mb-0 course-desc">{{ $item['description'] }}</p>
                                        <h3 class="text-primary course-price">$ {{ $item['price'] }}</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                {{-- <div class="col-xl-4">
                    <a href="{{ url('member/course-buy/1') }}">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-blog">
                                    <h5 class="text-primary">Liberfx Course</h5>
                                    <img src="{{ asset('uassets/images/profile/1.jpg') }}" alt=""
                                        class="mt-4 mb-4 rounded"
                                        style="width: 100%;
                                        height: auto;">
                                    <h3><a class="text-dark">Basic Of Trading</a></h3>
                                    <p class="mb-0">Endroll this course and get 5% monthly</p>
                                    <h3 class="text-primary">$ 210.00</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-4">
                    <a href="{{ url('member/course-buy/2') }}">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-blog">
                                    <h5 class="text-primary">Liberfx Course</h5>
                                    <img src="{{ asset('uassets/images/profile/1.jpg') }}" alt=""
                                        class="mt-4 mb-4 rounded"
                                        style="width: 100%;
                                        height: auto;">
                                    <h3><a class="text-dark">CandleStick & Price Action</a></h3>
                                    <p class="mb-0">Endroll this course and get 6% monthly</p>
                                    <h3 class="text-primary">$ 350.00</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-4">
                    <a href="{{ url('member/course-buy/3') }}">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-blog">
                                    <h5 class="text-primary">Liberfx Course</h5>
                                    <img src="{{ asset('uassets/images/profile/1.jpg') }}" alt=""
                                        class="mt-4 mb-4 rounded"
                                        style="width: 100%;
                                        height: auto;">
                                    <h3><a class="text-dark">Advance Trading Course</a></h3>
                                    <p class="mb-0">Endroll this course and get 7% monthly</p>
                                    <h3 class="text-primary">$ 450.00</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-4">
                    <a href="{{ url('member/course-buy/4') }}">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-blog">
                                    <h5 class="text-primary">Liberfx Course</h5>
                                    <img src="{{ asset('uassets/images/profile/1.jpg') }}" alt=""
                                        class="mt-4 mb-4 rounded"
                                        style="width: 100%;
                                        height: auto;">
                                    <h3><a class="text-dark">Fundamental Of Equities</a></h3>
                                    <p class="mb-0">Endroll this course and get 8% monthly</p>
                                    <h3 class="text-primary">$ 650.00</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-4">
                    <a href="{{ url('member/course-buy/5') }}">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-blog">
                                    <h5 class="text-primary">Liberfx Course</h5>
                                    <img src="{{ asset('uassets/images/profile/1.jpg') }}" alt=""
                                        class="mt-4 mb-4 rounded"
                                        style="width: 100%;
                                        height: auto;">
                                    <h3><a class="text-dark">Advance Trading Alogrithms</a></h3>
                                    <p class="mb-0">Endroll this course and get 9% monthly</p>
                                    <h3 class="text-primary">$ 1050.00</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div> --}}
            </div>
        </div>
    </div>
    <!--**********************************
                                                                                                                                                                                                                                                                                                                                                             Content body end                                                                                       ***********************************-->
@endsection
