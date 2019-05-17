@include("font-end.partials.head")
@include("font-end.partials.slider-home")
@include("font-end.partials.header")
<section id="content-home">
    <div class="container">
        <div class="list-item-home">
            @include('font-end.partials.item-home', array('name' => $p['title'], 'image'=> $p['image'], 'link'=> ""))
            @include('font-end.partials.item-home', array('name' => $n['title'], 'image'=> $n['image'], 'link'=> ""))
            @include('font-end.partials.item-home', array('name' => $b['title'], 'image'=> $b['image'], 'link'=> ""))
            @include('font-end.partials.item-home', array('name' => $c['title'], 'image'=> $c['image'], 'link'=> ""))

        </div>
    </div>
</section>
@include("font-end.partials.footer")
@include("font-end.partials.scripts")