@include("font-end.partials.head")
@include("font-end.partials.slider-home")
@include("font-end.partials.header")
<section id="content-home">
    <div class="container">
        <div class="list-item-home">
        @if($bst->count() > 0)
          @foreach($bst as $_bst)
            @include('font-end.partials.item-home', array('name' =>$_bst->text, 'image'=> $_bst->image, 'link'=> $_bst->link))
          @endforeach
        @endif
        </div>
        <div class="gallery-home">
        	<div class="title-gallery-home">
        		Gallery
        	</div>
        	<div class="des-gallery-home">
        		So let’s start a new conversation – a conversation about you – with the ultimate goal of creating true partnership. After all, that’s the essence of the new After all, that’s the essence of the new
        	</div>
         <div class="list-item-gallery">
            @if ($cls != null)
            @foreach($cls as $cl)
                @include("font-end.partials.item-gallery", ['collection' => $cl]) 
            @endforeach
            @endif
        </div>
    </div>
    <div class="video-home">
       <div class="list-video-post">
        <ul id="lightSlider" class="vertical">
          @if ($videos != null)
            @foreach($videos as $video)
              @include("font-end.partials.item-video", ['vi' => $video])
            @endforeach
          @endif
       </ul>
   </div>
</div>
</div>
</section>
@include("font-end.partials.footer")
@include("font-end.partials.scripts")