@extends('layouts.frontend.app')

@section('title','Upload')

@section('content')
<!-- error-alert start -->
<div class="error-message-area">
    <div class="error-content">
        <h4 class="error-msg">{{ __('Your Settings Successfully Updated') }}</h4>
    </div>
</div>
<!-- error-alert end -->
<!-- main area start -->
<section>
    <!-- ellipsis modal -->
    <div class="ellipish-modal d-none">
      <div class="ellipish-modal-content">
        
      </div>
  </div>
  <div class="main-area pt-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="video-upload-title">
                    <h2>{{ __('Update video') }}</h2>
                    <p class="percentence">{{ __('Post a video to your account') }}</p>
                </div>
                <div class="custom-form">
                    <form action="{{ route('post.update', $video->id) }}" method="POST">
                    @csrf
                    <input type="hidden" id="post_url2" name="post_url2" value="{{ route('post.update', $video->id) }}">
                    <div class="row">
                        <div class="col-lg-4">
                            <!-- <form action="{{ route('post.update', $video->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" id="update_video_url" value="{{ route('post.update', $video->id) }}"> -->
                                <!-- <input type="hidden" id="main_url" value="{{ route('welcome') }}"> -->
                                <div class="load-area">
                                    <div class="video-update-input-area">
                                        <video id="current_video" controls preload="metadata" muted="muted"><source id="current_video_src" src="{{ asset($video->url) }}" type="video/mp4"></video>
                                        <!-- <label for="update_video_src" class="text-center">
                                            <div class="info-star">
                                                <i class="fas fa-cloud-upload-alt"></i>
                                            </div>
                                        </label>
                                        <input type="file" name="video" onchange="video_update(event)" class="d-none" id="update_video_src"> -->
                                    </div>
                                </div>
                            <!-- </form> -->
                        </div>
                        <div class="col-lg-8">
                            <!-- <form action="{{ route('post.update', $video->id) }}" method="POST">
                                @csrf
                                <input type="hidden" id="post_url2" name="post_url2" value="{{ route('post.update', $video->id) }}"> -->
                                <div class="form-group">
                                    <label for="caption">{{ __('Caption') }}</label>
                                    <textarea name="caption" id="caption" class="form-control" cols="30" rows="10">{{ $video->title ? : old('title') }}</textarea>
                                </div>
                                <div class="video-public-privet-action">
                                    <h3>{{ __('Who can view this video') }}</h3>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        @if($video->status=="public")
                                        <input type="radio" id="public2" checked name="status" class="custom-control-input" value="public">
                                        @else
                                        <input type="radio" id="public2" name="status" class="custom-control-input" value="public">
                                        @endif
                                        <label class="custom-control-label" for="public2">{{ __('Public') }}</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        @if($video->status=="private")
                                        <input type="radio" id="privet2" checked name="status" class="custom-control-input" value="privat">
                                        @else
                                        <input type="radio" id="privet2" name="status" class="custom-control-input" value="privat">
                                        @endif
                                        <label class="custom-control-label" for="privet2">{{ __('Privet') }}</label>
                                    </div>
                                </div>
                                <div class="submit-post-action f-right">
                                    <a href="#">{{ __('Cancel') }}</a>
                                    <button class="disabled" type="submit">{{ __('Post') }}</button>
                                </div>
                            <!-- </form> -->
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- main area end -->
@endsection