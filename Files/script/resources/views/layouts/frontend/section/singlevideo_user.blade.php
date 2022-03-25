<div class="col-lg-4 mb-25 video-card-field-user">
  <div class="video-card-user">
    <video class="video-display" id='{{ $video->slug ? $video->slug : $video->id }}' onclick="popup2('{{ $video->slug ? $video->slug : $video->id }}')" loop muted="muted" onmouseover="mouseover('{{ $video->slug ? $video->slug : $video->id }}')" onmouseout="mouseout('{{ $video->slug ? $video->slug : $video->id }}')">
      <source src='{{ asset($video->url) }}' type='video/mp4'>
    </video>
    <video onclick="full_screen_play({{$video->id}})" class="video-responsive-display" id="full_screen_play_{{$video->id}}" >
      <source src='{{ asset($video->url) }}' type='video/mp4'>
    </video>
    <div class="video-card-details-info">
      <div class="video-author-profile-img">
        <a class="pjax" href="{{ route('profile.show',$video->user->slug) }}"><img src="{{ asset($video->user->image) }}" alt=""></a>
      </div>
      <div class="video-total-view">
       <div class="me-1"><i class="fas fa-play"></i> {{ App\Helpers\UserSystemInfo::conveter($video->view) }}</div>
       <div class="like-comment-icon">
        <i class="fa fa-heart" aria-hidden="true"></i>
        <i class="fa fa-comment" aria-hidden="true"></i>
       </div>
     </div>
   </div>
   <div class="loader{{ $video->slug }} d-none">
     <div class="video-loader"></div>
   </div>
 </div>
 <div class="video-edit">
    <div class="video-edit-field">
      <form action="{{ route('video.delete', $video->id) }}" method="POST" id="delete_form">
        @csrf
        <button type="submit f-right" style="color:white;" class="">
          <i class="fas fa-trash"></i>
        </button>
      </form>
      <div class="video-title">{{ $video->title }}</div>
      <form action="{{ route('video.edit', $video->id) }}" method="POST" id="delete_form">
        @csrf
        <button type="submit f-right" style="color:white;" class="">
          <i class="far fa-edit"></i>
        </button>
      </form>
    </div>
    <div class="approve">
        <button onclick="approve('{{$video->id}}')">
          <input type="hidden" id="approve_url" value="{{ route('approve') }}">
          <i id="approve_{{$video->id}}" class="{{ $video->approve == 1 ? 'fas fa-times' :'fas fa-check' }}"></i>
          <span id="approve_text_{{$video->id}}">{{ $video->approve == 1 ? 'UnApprove' : 'Approve' }} </span>
        </button>
    </div>
  </div>
</div>