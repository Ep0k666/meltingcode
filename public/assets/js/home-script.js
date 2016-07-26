$(function(){

	/*** Function for flexslider ***/
	$(window).load(function() {
      $('.flexslider').flexslider();
   	});

	/*** Récupération search bar ***/ 
	searchBar = $('#high_nav input');

	/*** Animate width for search bar ***/
	searchBar.on('click', function(){
		if($(window).width() >= 1201 || $(window).width() <= 992){
			searchBar.animate({width: '250px'}, 750, 'linear');
		}
	});

	/** --- Récupération des liens et de l'hamburger menu --- **/
	hamburger_menu 	= $('#hamburger');
	close_menu		= $('#close_menu');
	mobile_links	= $('#low_nav_mobile ul');
	title_container = $('#title_container');

	/** --- Quand je clique sur l'hamburger --- **/
	hamburger_menu.on("click", function(){
		if('mobile_links:hidden')
		{
			mobile_links.show();
			close_menu.css('display', 'block');
			hamburger_menu.hide();
		}
	})

	/** --- Quand je clique sur close menu --- **/
	close_menu.on("click", function(){
		if('close_menu:hidden')
		{
			mobile_links.hide();
			close_menu.hide();
			hamburger_menu.show();
		}
	})

	// Récupération item search + formulaire
	openSearch		= $('#open_search');
	closeSearch		= $('#close_search');
	searchForm 		= $('#high_nav form');
	firstLink		= $('#high_nav ul li:nth-child(1)');
	secondLink		= $('#high_nav ul li:nth-child(2)');

	openSearch.on('click', function(){
		if('searchForm:hidden')
		{
			firstLink.hide();
			secondLink.hide();
			searchForm.show();
			searchForm.css('position', 'absolute');
			searchBar.animate({width: '130px'}, 750, 'linear');
			searchForm.css('left', '40%');
			openSearch.hide();
			closeSearch.show();
		}
	})

	closeSearch.on('click', function(){
			if('searchForm:visible')
			{
				searchBar.css('width', '86px');
				firstLink.show();
				secondLink.show();
				searchForm.hide();
				closeSearch.hide();
				openSearch.show();
			}
	})

});
