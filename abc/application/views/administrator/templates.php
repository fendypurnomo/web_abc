<style>
	body {
		padding-top: 56px;
	}

	.sticky-offset {
		top: 56px;
	}

	#body-row {
		margin-left:0;
		margin-right:0;
	}

	#sidebar-container {
		min-height: 100vh;
		background-color: #333;
		padding: 0;
	}

	/* Sidebar sizes when expanded and expanded */
	.sidebar-expanded {
		width: 230px;
	}

	.sidebar-collapsed {
		width: 60px;
	}

	/* Menu item */
	#sidebar-container .list-group a {
		height: 50px;
		color: white;
	}

	/* Submenu item */
	#sidebar-container .list-group .sidebar-submenu a {
		height: 45px;
		padding-left: 30px;
	}

	.sidebar-submenu {
		font-size: 0.9rem;
	}

	/* Separators */
	.sidebar-separator-title {
		background-color: #333;
		height: 35px;
	}

	.sidebar-separator {
		background-color: #333;
		height: 25px;
	}

	.logo-separator {
		background-color: #333;
		height: 60px;
	}

	/* Closed submenu icon */
	#sidebar-container .list-group .list-group-item[aria-expanded="false"] .submenu-icon::after {
		content: " \f0d7";
		font-family: FontAwesome;
		display: inline;
		text-align: right;
		padding-left: 10px;
	}

	/* Opened submenu icon */
	#sidebar-container .list-group .list-group-item[aria-expanded="true"] .submenu-icon::after {
		content: " \f0da";
		font-family: FontAwesome;
		display: inline;
		text-align: right;
		padding-left: 10px;
	}
</style>

<!-- Bootstrap NavBar -->
<nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<a class="navbar-brand" href="#">
		<img src="https://v4-alpha.getbootstrap.com/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
		<span class="menu-collapsed">My Bar</span>
	</a>

	<div class="collapse navbar-collapse" id="navbarNavDropdown">
		<ul class="navbar-nav">
			<li class="nav-item active">
				<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Features</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Pricing</a>
			</li>

			<!-- This menu is hidden in bigger devices with d-sm-none. The sidebar isn't proper for smaller screens imo, so this dropdown menu can keep all the useful sidebar itens exclusively for smaller screens -->
			<li class="nav-item dropdown d-sm-block d-md-none">
				<a class="nav-link dropdown-toggle" href="#" id="smallerscreenmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>
				<div class="dropdown-menu" aria-labelledby="smallerscreenmenu">
					<a class="dropdown-item" href="#">Dashboard</a>
					<a class="dropdown-item" href="#">Profile</a>
					<a class="dropdown-item" href="#">Tasks</a>
					<a class="dropdown-item" href="#">Etc ...</a>
				</div>
			</li>
			<!-- Smaller devices menu END -->
		</ul>
	</div>
</nav>

<!-- Bootstrap row -->
<div class="row" id="body-row">
	<!-- Sidebar -->
	<div id="sidebar-container" class="sidebar-expanded d-none d-md-block col-2">
		<!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
		<!-- Bootstrap List Group -->
		<ul class="list-group sticky-top sticky-offset">
			<!-- Separator with title -->
			<li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
				<small>MAIN MENU</small>
			</li>

			<!-- Menu with submenu -->
			<a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
				<div class="d-flex w-100 justify-content-start align-items-center">
					<span class="fa fa-dashboard fa-fw mr-3"></span>
					<span class="menu-collapsed">Dashboard</span>
					<span class="submenu-icon ml-auto"></span>
				</div>
			</a>

			<!-- Submenu content -->
			<div id="submenu1" class="collapse sidebar-submenu">
				<a href="#" class="list-group-item list-group-item-action bg-dark text-white">
					<span class="menu-collapsed">Charts</span>
				</a>
				<a href="#" class="list-group-item list-group-item-action bg-dark text-white">
					<span class="menu-collapsed">Reports</span>
				</a>
				<a href="#" class="list-group-item list-group-item-action bg-dark text-white">
					<span class="menu-collapsed">Tables</span>
				</a>
			</div>

			<a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
				<div class="d-flex w-100 justify-content-start align-items-center">
					<span class="fa fa-user fa-fw mr-3"></span>
					<span class="menu-collapsed">Profile</span>
					<span class="submenu-icon ml-auto"></span>
				</div>
			</a>

			<!-- Submenu content -->
			<div id="submenu2" class="collapse sidebar-submenu">
				<a href="#" class="list-group-item list-group-item-action bg-dark text-white">
					<span class="menu-collapsed">Settings</span>
				</a>
				<a href="#" class="list-group-item list-group-item-action bg-dark text-white">
					<span class="menu-collapsed">Password</span>
				</a>
			</div>

			<a href="#" class="bg-dark list-group-item list-group-item-action">
				<div class="d-flex w-100 justify-content-start align-items-center">
					<span class="fa fa-tasks fa-fw mr-3"></span>
					<span class="menu-collapsed">Tasks</span>
				</div>
			</a>

			<!-- Separator with title -->
			<li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
				<small>OPTIONS</small>
			</li>

			<a href="#" class="bg-dark list-group-item list-group-item-action">
				<div class="d-flex w-100 justify-content-start align-items-center">
					<span class="fa fa-calendar fa-fw mr-3"></span>
					<span class="menu-collapsed">Calendar</span>
				</div>
			</a>

			<a href="#" class="bg-dark list-group-item list-group-item-action">
				<div class="d-flex w-100 justify-content-start align-items-center">
					<span class="fa fa-envelope-o fa-fw mr-3"></span>
					<span class="menu-collapsed">Messages <span class="badge badge-pill badge-primary ml-2">5</span></span>
				</div>
			</a>

			<!-- Separator without title -->
			<li class="list-group-item sidebar-separator menu-collapsed"></li>

			<a href="#" class="bg-dark list-group-item list-group-item-action">
				<div class="d-flex w-100 justify-content-start align-items-center">
					<span class="fa fa-question fa-fw mr-3"></span>
					<span class="menu-collapsed">Help</span>
				</div>
			</a>

			<a href="#" data-toggle="sidebar-colapse" class="bg-dark list-group-item list-group-item-action d-flex align-items-center">
				<div class="d-flex w-100 justify-content-start align-items-center">
					<span id="collapse-icon" class="fa fa-2x mr-3"></span>
					<span id="collapse-text" class="menu-collapsed">Collapse</span>
				</div>
			</a>

			<!-- Logo -->
			<li class="list-group-item logo-separator d-flex justify-content-center">
				<img src="https://v4-alpha.getbootstrap.com/assets/brand/bootstrap-solid.svg" width="30" height="30">
			</li>
		</ul>
	</div>

	<!-- Main -->
	<div class="col py-3">
		<h1>Collapsing Menu
			<small class="text-muted">Version 2.1</small>
		</h1>

		<div class="card">
			<h4 class="card-header">Requirements</h4>
			<div class="card-body">
				<ul>
					<li>JQuery</li>
					<li>Bootstrap 4 beta-3</li>
				</ul>
			</div>
		</div>

		<hr>

		<p>
			Sriracha biodiesel taxidermy organic post-ironic, Intelligentsia salvia mustache 90's code editing brunch.
			Butcher polaroid VHS art party, hashtag Brooklyn deep v PBR narwhal sustainable mixtape swag wolf squid tote bag.
			Tote bag cronut semiotics, raw denim deep v taxidermy messenger bag.
			Tofu YOLO Etsy, direct trade ethical Odd Future jean shorts paleo.
			Forage Shoreditch tousled aesthetic irony, street art organic Bushwick artisan cliche semiotics ugh synth chillwave meditation.
			Shabby chic lomo plaid vinyl chambray Vice. Vice sustainable cardigan, Williamsburg master cleanse hella DIY 90's blog.
		</p>

		<hr>

		<p>
			Ethical Kickstarter PBR asymmetrical lo-fi.
			Dreamcatcher street art Carles, stumptown gluten-free Kickstarter artisan Wes Anderson wolf pug.
			Godard sustainable you probably haven't heard of them, vegan farm-to-table Williamsburg slow-carb readymade disrupt deep v.
			Meggings seitan Wes Anderson semiotics, cliche American Apparel whatever.
			Helvetica cray plaid, vegan brunch Banksy leggings +1 direct trade.
			Wayfarers codeply PBR selfies.
			Banh mi McSweeney's Shoreditch selfies, forage fingerstache food truck occupy YOLO Pitchfork fixie iPhone fanny pack art party Portland.
		</p>

		<hr>

		<p>
			Ethical Kickstarter PBR asymmetrical lo-fi.
			Dreamcatcher street art Carles, stumptown gluten-free Kickstarter artisan Wes Anderson wolf pug.
			Godard sustainable you probably haven't heard of them, vegan farm-to-table Williamsburg slow-carb readymade disrupt deep v.
			Meggings seitan Wes Anderson semiotics, cliche American Apparel whatever.
			Helvetica cray plaid, vegan brunch Banksy leggings +1 direct trade.
			Wayfarers codeply PBR selfies.
			Banh mi McSweeney's Shoreditch selfies, forage fingerstache food truck occupy YOLO Pitchfork fixie iPhone fanny pack art party Portland.
		</p>

		<hr>

		<p>
			Ethical Kickstarter PBR asymmetrical lo-fi.
			Dreamcatcher street art Carles, stumptown gluten-free Kickstarter artisan Wes Anderson wolf pug.
			Godard sustainable you probably haven't heard of them, vegan farm-to-table Williamsburg slow-carb readymade disrupt deep v.
			Meggings seitan Wes Anderson semiotics, cliche American Apparel whatever.
			Helvetica cray plaid, vegan brunch Banksy leggings +1 direct trade.
			Wayfarers codeply PBR selfies.
			Banh mi McSweeney's Shoreditch selfies, forage fingerstache food truck occupy YOLO Pitchfork fixie iPhone fanny pack art party Portland.
		</p>

		<hr>

		<p>
			Ethical Kickstarter PBR asymmetrical lo-fi.
			Dreamcatcher street art Carles, stumptown gluten-free Kickstarter artisan Wes Anderson wolf pug.
			Godard sustainable you probably haven't heard of them, vegan farm-to-table Williamsburg slow-carb readymade disrupt deep v.
			Meggings seitan Wes Anderson semiotics, cliche American Apparel whatever.
			Helvetica cray plaid, vegan brunch Banksy leggings +1 direct trade.
			Wayfarers codeply PBR selfies.
			Banh mi McSweeney's Shoreditch selfies, forage fingerstache food truck occupy YOLO Pitchfork fixie iPhone fanny pack art party Portland.
		</p>

		<hr>

		<p>
			Ethical Kickstarter PBR asymmetrical lo-fi.
			Dreamcatcher street art Carles, stumptown gluten-free Kickstarter artisan Wes Anderson wolf pug.
			Godard sustainable you probably haven't heard of them, vegan farm-to-table Williamsburg slow-carb readymade disrupt deep v.
			Meggings seitan Wes Anderson semiotics, cliche American Apparel whatever.
			Helvetica cray plaid, vegan brunch Banksy leggings +1 direct trade.
			Wayfarers codeply PBR selfies.
			Banh mi McSweeney's Shoreditch selfies, forage fingerstache food truck occupy YOLO Pitchfork fixie iPhone fanny pack art party Portland.
		</p>

		<hr>

		<p>
			Ethical Kickstarter PBR asymmetrical lo-fi.
			Dreamcatcher street art Carles, stumptown gluten-free Kickstarter artisan Wes Anderson wolf pug.
			Godard sustainable you probably haven't heard of them, vegan farm-to-table Williamsburg slow-carb readymade disrupt deep v.
			Meggings seitan Wes Anderson semiotics, cliche American Apparel whatever.
			Helvetica cray plaid, vegan brunch Banksy leggings +1 direct trade.
			Wayfarers codeply PBR selfies.
			Banh mi McSweeney's Shoreditch selfies, forage fingerstache food truck occupy YOLO Pitchfork fixie iPhone fanny pack art party Portland.
		</p>
	</div>
</div>

<script>
	//Hide submenus
	$('#body-row .collapse').collapse('hide');

	//Collapse/Expand icon
	$('#collapse-icon').addClass('fa-angle-double-left');

	//Collapse click
	$('[data-toggle=sidebar-colapse]').click(function(){
		SidebarCollapse();
	});

	function SidebarCollapse(){
		$('.menu-collapsed').toggleClass('d-none');
		$('.sidebar-submenu').toggleClass('d-none');
		$('.submenu-icon').toggleClass('d-none');
		$('#sidebar-container').toggleClass('sidebar-expanded sidebar-collapsed');

		//Treating d-flex/d-none on separators with title
		var SeparatorTitle = $('.sidebar-separator-title');

		if(SeparatorTitle.hasClass('d-flex')){
			SeparatorTitle.removeClass('d-flex');
		} else {
			SeparatorTitle.addClass('d-flex');
		}

		//Collapse/Expand icon
		$('#collapse-icon').toggleClass('fa-angle-double-left fa-angle-double-right');
	}
</script>
