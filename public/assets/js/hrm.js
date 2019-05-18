
function creatSlug(_str, _element) {
    var url_ =  "http://localhost/hrm-projects/goldwell/public/create-slug";
    $.ajax({
      type: "POST",
      data: {"_token": $('meta[name="csrf-token"]').attr('content'),"str": _str},
      url: url_,
      success: function(data){
         _element.val(data.slug);
     }
 });

}

$("#name").on('change', function() {
    creatSlug($(this).val(), $("#slug"));
});
