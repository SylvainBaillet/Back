/*on receptionne le DOM auquel on associe la fonction 'ready' qui executera la fonction une fois que le DOM sera chargé completement.*/
$(document).ready(function(){
    
        var prenom = $("#personne").text();// on selectionne le selecteur id 'personne' afin de recuperer l'id de l'employé selectionné
        console.log(prenom);

        var parameters = "prenom="+prenom;/* on definie les parametres envoyés a la requete AJAX 'aller' qui sera transmise a la requete de suppression PHP dans le fichier ajax3.php*/
        console.log(parameters);
    
    // La reponse de la requete 'retour' AJAX se trouve dans 'data'    
    $.post("ajax4.php", parameters, function (data){
        /* on selectionne la div 'id 'resultat'  pour coller le tableau ($tab['resultat']) definit dans la page ajax4.php */
        $('#resultat').html(data.resultat);
    },'json');
});