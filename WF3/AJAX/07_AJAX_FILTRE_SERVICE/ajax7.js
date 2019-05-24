$(document).ready(function (){
    $('#service').change(function(){
    ajax();
});

    function ajax(){

        var service = $("#service").val();// on selectionne le selecteur id 'service' afin de recuperer l'id du service selectionné
        console.log(service);

        var parameters = "service=" + service;/* on definie les parametres envoyés a la requete AJAX 'aller' qui sera transmise a la requete de selection PHP dans le fichier ajax7.php 'service' correspond a $service dans la requete de selection dans ajax7.php*/
        console.log(parameters);


    $.post("ajax7.php", parameters, function(data){
        $('#resultat').html(data.resultat);   
    }, 'json');
  }
});