$(function() {
	var urlPathname = window.location.pathname;
	var urlHref = window.location.href;

	new PerfectScrollbar('.sidebar-nav');
	new PerfectScrollbar('.main-content');
	new PerfectScrollbar('.dropdown_menu_scroll');

	$(".sidebar-nav a").each(function() {
		if ((urlPathname.indexOf($(this).attr('data-url'))) > -1) {
			$(this).addClass('active');
		} else if (urlHref.substr(urlHref.lastIndexOf('/') + 1) == "") {
			$('[data-url=home]').addClass('active');
		}
	});

  $("#sidebarToggle").on('click',function(e) {
    e.preventDefault();
		$("#sidebar").toggleClass("d-lg-block");

		if (!$("#sidebar").hasClass("d-lg-block")) {
			$.cookie('sidebar-toggle','1',{path:'/',secure:true});
		} else {
			$.cookie('sidebar-toggle',null,{path:'/',secure:true});
		}
  });

	$('#sidebar-nav a').on('click',function(e) {
		if (!$(this).hasClass("active")) {
			$("a",$(this).parents("ul:first")).removeClass("active");
			$(this).addClass("active");
		} else if ($(this).hasClass("active")) {
			$(this).removeClass("active");
			$(this).parents("ul:first").removeClass("active");
		}
	})
});
