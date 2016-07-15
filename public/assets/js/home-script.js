$(function(){

	/*** Function for flexslider ***/
	$(window).load(function() {
      $('.flexslider').flexslider();
   	});

	/*** Récupération search bar ***/ 
	searchBar = $('#high_nav input');

	/*** Animate width for search bar ***/
	searchBar.on('click', function(){
		if($(window).width() >= 1201){
			searchBar.animate({width: '250px'}, 750, 'linear');
		}
	});

})
