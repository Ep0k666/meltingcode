$(function(){

	/*** Function for flexslider ***/
	$(window).load(function() {
      $('.flexslider').flexslider();
   	});

	/*** Récupération search bar ***/ 
	searchBar = $('#search_bar');

	/*** Animate width for search bar ***/
	searchBar.on('click', function(){
		if($(window).width() >= 1201 || $(window).width() <= 992 && $(window).width() >= 701){
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
});
