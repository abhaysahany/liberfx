@extends('admin.layouts.main')
@section('title', 'Dash Videos')
@section('container')
    <style>
        #dash-video-form {
            display: flex;
            flex-direction: column;
        }

        #dash-video-form .dash-video-field {
            position: static !important;
            display: flex;
            flex-direction: column;
            clear: both;
            width: 100%;
        }

        #dash-video-form .form-label {
            display: block;
            margin-bottom: 0.5rem;
        }

        #dash-video-form .form-control,
        #dash-video-form .form-select {
            position: static !important;
            display: block;
            float: none;
            width: 100%;
            max-width: 100%;
            min-width: 0;
            margin: 0;
            transform: none !important;
        }

        #dash-video-form .form-select {
            height: calc(1.5em + 0.9rem + 2px) !important;
            min-height: calc(1.5em + 0.9rem + 2px);
            padding-top: 0.45rem;
            padding-bottom: 0.45rem;
        }

        #dash-video-form .dash-video-actions {
            display: flex;
            clear: both;
            justify-content: flex-end;
        }

        @media (max-width: 575.98px) {
            #dash-video-form .dash-video-actions .btn {
                width: 100%;
            }
        }
    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item active" aria-current="page">Dash Videos</li>
                            </ol>
                        </nav>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>

        @if (session()->has('uploadMsg'))
            <div class="alert alert-success" role="alert">
                {{ session('uploadMsg') }}
            </div>
        @endif

        @if (session()->has('delMsg'))
            <div class="alert alert-success" role="alert">
                {{ session('delMsg') }}
            </div>
        @endif

        @if (session()->has('failedMsg'))
            <div class="alert alert-danger" role="alert">
                {{ session('failedMsg') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-5">
                <div class="card" style="zoom: 90%">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">{{ $editVideo ? __('Edit Dash Video') : __('Add Dash Video') }}</h4>
                        @if ($editVideo)
                            <a href="{{ url('admin/dash-videos') }}" class="btn btn-sm btn-light">Cancel Edit</a>
                        @endif
                    </div>
                    <div class="card-body px-3">
                        <form id="dash-video-form" action="{{ route('uploadDashVid') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            @if ($editVideo)
                                <input type="hidden" name="id" value="{{ $editVideo->id }}">

                                <div class="form-group dash-video-field mb-3">
                                    <label class="form-label">Current Video</label>
                                    @if (is_file(public_path('uploads/dash-videos/' . basename($editVideo->video))))
                                        <video class="w-100 rounded" controls preload="metadata"
                                            aria-label="Current dashboard video">
                                            <source
                                                src="{{ asset('uploads/dash-videos/' . basename($editVideo->video)) }}"
                                                type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @else
                                        <div class="alert alert-warning mb-0" role="alert">
                                            The current video file is unavailable. Upload a replacement below.
                                        </div>
                                    @endif
                                </div>
                            @endif

                            <div class="form-group dash-video-field mb-3">
                                <label for="video" class="form-label">
                                    {{ $editVideo ? __('Replace Video') : __('Video') }}
                                    @unless ($editVideo)
                                        <span class="text-danger">*</span>
                                    @endunless
                                </label>
                                <input id="video" type="file" name="video"
                                    class="form-control @error('video') is-invalid @enderror" accept=".mp4,video/mp4"
                                    aria-describedby="videoHelp" @required(!$editVideo)>
                                <small id="videoHelp" class="form-text text-muted">MP4 only. Maximum file size: 50 MB.</small>
                                @error('video')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group dash-video-field mb-3">
                                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                <select id="status" name="status"
                                    class="form-select @error('status') is-invalid @enderror" required>
                                    <option value="Non Live"
                                        @selected(old('status', $editVideo ? $editVideo->status : 'Non Live') === 'Non Live')>
                                        Not Live
                                    </option>
                                    <option value="Live"
                                        @selected(old('status', $editVideo ? $editVideo->status : 'Non Live') === 'Live')>
                                        Live
                                    </option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                @error('id')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="dash-video-actions">
                                <button type="submit" class="btn btn-primary">
                                    {{ $editVideo ? __('Update Video') : __('Add Video') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <div class="card" style="zoom: 90%">
                    <div class="card-header">
                        <h4 class="mb-0">{{ __('Dash Videos') }}</h4>
                    </div>
                    <div class="card-body px-3">
                        <div class="responsive" style="overflow: auto">
                            <table id="basic-datatable" class="table nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>{{ __('S.No') }}</th>
                                        <th>{{ __('Video') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Added On') }}</th>
                                        <th class="text-center">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $list)
                                        @php
                                            $filename = basename($list->video);
                                            $videoExists = is_file(public_path('uploads/dash-videos/' . $filename));
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if ($videoExists)
                                                    <video width="190" controls preload="none" class="rounded"
                                                        aria-label="Dashboard video {{ $loop->iteration }}">
                                                        <source src="{{ asset('uploads/dash-videos/' . $filename) }}"
                                                            type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                @else
                                                    <span class="text-warning">File unavailable</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($list->status === 'Live')
                                                    <span class="badge bg-success">Live</span>
                                                @else
                                                    <span class="badge bg-warning text-dark">Not Live</span>
                                                @endif
                                            </td>
                                            <td>{{ $list->created_at ? $list->created_at->format('d M Y, h:i A') : '-' }}</td>
                                            <td>
                                                <div class="d-flex flex-wrap gap-1 justify-content-center">
                                                    @if (! $videoExists && $list->status !== 'Live')
                                                        <span class="btn btn-sm btn-secondary disabled"
                                                            title="Upload a replacement before setting this video Live">
                                                            {{ __('File Missing') }}
                                                        </span>
                                                    @else
                                                        <a class="btn btn-sm {{ $list->status === 'Live' ? 'btn-warning' : 'btn-success' }}"
                                                            href="{{ url('admin/dash-video/status-change/' . $list->id) }}?_token={{ csrf_token() }}">
                                                            {{ $list->status === 'Live' ? __('Set Not Live') : __('Set Live') }}
                                                        </a>
                                                    @endif
                                                    <a class="btn btn-sm btn-primary"
                                                        href="{{ url('admin/dash-videos') }}?edit={{ $list->id }}">
                                                        {{ __('Edit') }}
                                                    </a>
                                                    <a class="btn btn-sm btn-danger"
                                                        href="{{ url('admin/dash-video/delete/' . $list->id) }}?_token={{ csrf_token() }}"
                                                        onclick="return confirm('Are you sure you want to delete this video?')">
                                                        {{ __('Delete') }}
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted">No dashboard videos found.</td>
                                        </tr>
                                    @endforelse
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
@endsection
