/*
jQuery('.history-api').on('click', function(event) {
	event.preventDefault();
	var page = $(this).attr('href');
	$.ajax({
		url: page,
		success: function(data) {
			var dom = $(data);
			var title = dom.filter('title').text();
			$('title').text(title);
			$('#history-api').html(data);
			window.history.pushState({path:page},'',page);
		}
	});
	return false;
});

$(window).on('popstate', function () {
	$.ajax({
		url: location.pathname,
		success: function (data) {
			$('#history-api').html(data);
		}
	});
});
*/

/*
jQuery('document').ready(function() {
	jQuery('.history-api').on('click', function(e) {
		e.preventDefault();

		var href = $(this).attr('href');

		getContent(href, true);

		jQuery('.history-api').removeClass('active');
		$(this).addClass('active');
	});
});

window.addEventListener("popstate", function(e) {
	getContent(location.pathname, false);
});

function getContent(url, addEntry) {
	$.get(url)
	.done(function( data ) {
		var dom = $(data);
		var title = dom.filter('title').text();
		$('title').text(title);
		$('#history-api').html(data);

		if(addEntry == true) {
			history.pushState(null, null, url);
		}
	});
}
*/

/*
$(function(){
	var replacePage = function(url) {
		$.ajax({
			url: url,
			type: 'get',
			dataType: 'html',
			success: function(data){
				var dom = $(data);
				var title = dom.filter('title').text();
				var html = dom.filter('#history-api').html();
				$('title').text(title);
				$('#history-api').html(html);
			}
		});
	}

	$(document).on("click", ".history-api", function(e){
		history.pushState(null, null, this.href);
		replacePage(this.href);
		e.preventDefault();
	});

	window.addEventListener("popstate", function(e) {
		getContent(location.pathname, false);
	});
});
*/
