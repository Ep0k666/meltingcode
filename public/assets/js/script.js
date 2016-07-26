$(function(){
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
});

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