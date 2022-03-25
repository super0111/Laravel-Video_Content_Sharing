@extends('layouts.frontend.app')

@section('content')

<!-- success-alert start -->
<div class="alert-message-area">
    <div class="alert-content">
        <h4 class="ale">{{ __('Your Settings Successfully Updated') }}</h4>
    </div>
</div>
<!-- success-alert end -->

<!-- error-alert start -->
<div class="error-message-area">
    <div class="error-content">
        <h4 class="error-msg">{{ __('Your Settings Successfully Updated') }}</h4>
    </div>
</div>
<!-- error-alert end -->

<!-- ellipsis modal -->
<div class="ellipish-modal d-none">
  <div class="ellipish-modal-content">
    
  </div>
</div>


<!-- modal -->
<div class="bg-modal d-none">
    <div class="close-btn">
        <a href="javascript:void(0)"><img src="{{ asset('frontend/img/cancel.png') }}"></a>
    </div>
    <div class="modal-content-area">
      
    </div>
</div>

<section>
    <div class="main-area pt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-area-title">
                                <div class="d-flex justify-content-between">
                                    <h2>{{ __('Cartegory') }}</h2>
                                    <!-- <form action="{{ route('videoSearch') }}" method="POST"> -->
                                        <div class="video-search">
                                            <input type="text" placeholder="{{ __('Video Search') }}" oninput="videoSearch_cart()" id="videoSearch_cart" autocomplete="off">
                                            <input type="hidden" id="videoSearch_url_cart" value="{{ route('videoSearch_cart') }}">
                                            <input type="hidden" id="base_url" value="{{ url('/') }}">
                                        </div>
                                    <!-- </form> -->
                                </div>
                            </div>
                            <p>{{ __('Watch video of your cartegory') }}</p>
                        </div>
                    </div>
                    @csrf
                    <div class="row grid video-panel_cart">
                        @if(!$videos==null)
                            @foreach($videos as $video)
                            @include('layouts.frontend.section.singleCartegoryVideo')
                            @endforeach
                        @elseif($video==null)
                            <div>No Results</div>
                        @endif
                    </div>
                    <div class="page-load-status">
                      <p class="infinite-scroll-request"></p>
                      <p class="infinite-scroll-error">{{ __('No more pages to load') }}</p>
                    </div>
                </div>
                @include('layouts.frontend.partials.sidebar')
            </div>
        </div>
    </div>
</section>
<input type="hidden" id="popup_url" value="{{ route('popup') }}">
<input type="hidden" id="ellipsis_url" value="{{ route('ellipsis') }}">
<input type="hidden" id="asset_url" value="{{ route('welcome') }}">

<!-- copied to clipboard -->
<div class="copied">
  <p>{{ __('Link copied to clipboard.') }}</p>
</div>
@endsection