$(function() {
        $(document).ready( function() {
      
        $('#city').attr('disabled','disabled');
      
      }); 
      $('#city').focus( function() {
        
        $(this).autocomplete( "search", "" );
        
      });
      
      // OnKeyDown Function
      $("#zip").keyup(function() {
        var zip_in = $(this);
        var zip_box = $('#zipbox');
        
        if (zip_in.val().length<5)
        {
          zip_box.removeClass('error success');
        }
        else if ( zip_in.val().length>5)
        {
          zip_box.addClass('error').removeClass('success');
        }
        else if ((zip_in.val().length == 5) ) 
        {
          
          // Make HTTP Request
          $.ajax({
            url: "http://api.zippopotam.us/fr/" + zip_in.val(),
            cache: false,
            dataType: "json",
            type: "GET",
            success: function(result, success) {
              // Enable the city box
              $('#city').removeAttr('disabled');
              
              // FR Post Code Returns multiple location
              suggestions = [];
              for ( ii in result['places']){
                suggestions.push(result['places'][ii]['place name']);
              }
              $("#city").autocomplete({ source : suggestions , delay:50, disabled: false, minLength:0 });
              if ( suggestions.length > 0){
                $('#city').placeholder = suggestions[0];
              }
              zip_box.addClass('success').removeClass('error');
            },
            error: function(result, success) {
              zip_box.removeClass('success').addClass('error');
            }
          });
        }
  });
});

//$(function(){
    // il faut rajouter dan s le layout je script d'accès au jqueryui pour afficher correctement le datepicker
    /*$(window).load(function() {
      $('.flexslider').flexslider();
   });*/
   /* $( ".datepicker" ).datepicker({
        altField: "#datepicker",
        closeText: 'Fermer',
        prevText: 'Précédent',
        nextText: 'Suivant',
        currentText: 'Aujourd\'hui',
        monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
        monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
        dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
        dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
        dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
        weekHeader: 'Sem.',
        dateFormat: 'yy-mm-dd'
    });
*/
//});

/*var geocoder = "http://maps.googleapis.com/maps/api/geocode/json?address=%s&sensor=false";
    
$('document').ready(function(){
    // au click de la confirmation de la recherche de l'itinéraire
    $("[name='shop-add']").click(function() {
        // Récupération de l'adresse tapée dans le formulaire
        var adresse = $("[name='city']").val();
        geocoder.geocode( { 'address': adresse}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                // Récupération des coordonnées GPS du lieu tapé dans le formulaire
                strposition_lat = results[0].geometry.location.lat();
                strposition_lng = results[0].geometry.location.lng();
                //console.log(strposition_lat);
                //console.log(strposition_lng);
                //envoie des données en Ajax du select qui permet de choisir la distance de recherche
                // reception en Ajax des latitudes et longitudes de la page PHP ainsi que du statuts de l'envoie
                $.ajax({
                    type: "POST",
                    url: ajax_path_create_url,
                    data: {
                        lat: strposition_lat,
                        lng: strposition_lng
                    },
                    success: function(data){
                        console.log(data);
                    }
                });
            } else {
                alert('Adresse introuvable: ' + status);
            }
        });
    });
});*/
