$('span.like').on('click', function() {
	var topic_id = quiz_request.topic;
	var like = $(this).attr('value');
	$.ajax({
		method : 'POST',
		url : urlLike,
		data : {
			topic_id : topic_id,
			like : like,
			_token : token,
		},
		success:function(dataResponse) {
			if (dataResponse.isLike == true) {
				if (like == 1) {
					$('span.icon-down').removeClass('icon-like');
					$('span.icon-up').addClass('icon-like');
				} else {
					$('span.icon-up').removeClass('icon-like');
					$('span.icon-down').addClass('icon-like');
				}
			} else {
				if (like == 1) {
					$('span.icon-up').removeClass('icon-like');
				} else {
					$('span.icon-down').removeClass('icon-like');
				}
			}
			$('span.up').html(dataResponse.like_count);
			$('span.down').html(dataResponse.dislike_count);
		}
	});
});
