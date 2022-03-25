<div class="col-lg-4 mb-25">
  <div class="video-card">
  <!-- id='{{ $video->slug ? $video->slug : $video->id }}' -->
    <video class="video-display" id="my-video" onclick="popup('{{ $video->slug ? $video->slug : $video->id }}')" loop muted="muted" onmouseover="mouseover('{{ $video->slug ? $video->slug : $video->id }}')" onmouseout="mouseout('{{ $video->slug ? $video->slug : $video->id }}')">
      <source src='{{ asset($video->url) }}' type='video/mp4'>
    </video>
    <video onclick="full_screen_play('{{$video->id}}')" class="video-responsive-display" id="full_screen_play_{{$video->id}}" >
      <source src='{{ asset($video->url) }}' type='video/mp4'>
    </video>
    @if(Auth::check())
    <div onclick="cartegory('{{$video->id}}')" class="cartegory-add">
      <input type="hidden" id="cartegory_url" value="{{ route('cartegory') }}">
      <i id="cartegory" class="{{ $video->cartegory == 0 ? 'fas fa-shopping-cart' : 'fas fa-cart-plus' }}"></i>
    </div>
    @endif
    <div class="video-card-details-info">
      <div class="video-author-profile-img">
        <a class="pjax" href="{{ route('profile.show',$video->user->slug) }}"><img src="{{ asset($video->user->image) }}" alt=""></a>
      </div>
      <div class="video-total-view">
       <div class="me-1"><i class="fas fa-play"></i> {{ App\Helpers\UserSystemInfo::conveter($video->view) }}</div>
       <div class="video-title">{{ $video->title }}</div>
       <div class="like-comment-icon">
        @if(Auth::check())
          <a onclick="like2('{{ $video->id }}')">
              <i id="like2" class="{{ !Auth::User()->favourite_videos->where('pivot.video_id',$video->id)->count() == true ? 'fas fa-heart' : 'far fa-heart' }}"></i>
          </a>
          @else
          <a href="{{ route('login') }}" class="pjax" onclick="profileshow2()"><i id="like2" class="far fa-heart"></i></a>
          @endif
          <i onclick="commentPopUp('{{ $video->slug ? $video->slug : $video->id }}')" class="fa fa-comment" aria-hidden="true"></i>
       </div>
       <input type="hidden" id="like_url2" value="{{ route('like2') }}">
     </div>
   </div>
   <div class="loader{{ $video->slug }} d-none">
     <div class="video-loader"></div>
   </div>
 </div>
</div>
<input type="hidden" id="video_ads_url" value="{{ route('ads.show') }}">
<input type="hidden" id="report_url" value="{{ route('report.show') }}">
<script src="{{ asset('frontend/js/modal/modal.js') }}"></script>
<!-- <script src="https://cdn.fluidplayer.com/v3/current/fluidplayer.min.js"></script> -->
<!-- <script>
var player = fluidPlayer(
   'my-video',
    {
        layoutControls: {
            // Parameters to customise the look and feel of the player
        },
        vastOptions: {
            // Parameters to customise how the ads are displayed & behave
        }
    }
);
</script> -->