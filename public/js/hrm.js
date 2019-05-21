var fmPath = $("#_url_filemanage_1").val();
var fmPath_2 = $("#_url_filemanage_2").val();

function settingIframe(_id){
	$(_id).fancybox({
			'width': 900,
			'height': 900,
			'type': 'iframe',
			'autoScale': false,
			'autoSize': false,
			afterClose: function () {
				var thumb = $('#thumb_0').val();
				if (thumb) {
					var html = '<div class="img_preview"><img src="' + thumb + '"/>';
					html += '<input type="hidden" name="image" value="' + thumb + '" /> </div>';
					$('#preview').html(html);
				}
			}
	});
}
