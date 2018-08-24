$(function(){
	if ($('.category-list').length) {
		$.get($('.category-list').data('url'),function(html){
			$('.category-list').html(html)
		})
	}
	if ($('.tag-list').length) {
		$.get($('.tag-list').data('url'),function(html){
			$('.tag-list').html(html)
		})
	}
	if ($('.detail-list').length) {
		$.get($('.detail-list').data('url'),function(html){
			$('.detail-list').html(html)
		})
	}
})