/*on receptionne le DOM auquel on associe la fonction 'ready' qui executera la fonction une fois que le DOM sera chargé completement.*/
$(document).ready(function () {
    $("#submit").click(function (event) {//on selectionne le bouton submit auquel j'associe l'evenement click
        event.preventDefault();/*on receptionne le DOM auquel on associe la fonction 'ready' qui executera la fonction une fois que le DOM sera chargé completement.*/
        ajax();// fonction utilisateur executée ci dessous , le nome n'est pas defini, j'aurais pu mettre ce que je veux, pour chaque clic sur le bouton id submit, j'execute la fonction 'ajax()' declarée ci dessous
    });

    function ajax() {
    var id = $("#personne").val();// on selectionne le selecteur id 'prenom' afin de recuperer l'id de l'employé selectionné
    console.log(id);

    var parameters = "id=" + id;/* on definie les parametres envoyés a la requete AJAX 'aller' qui sera transmise a la requete de suppression PHP dans le fichier ajax5.php 'id' correspond a $id dans la requete de selection dans ajax5.php*/
    console.log(parameters);

    // La reponse de la requete 'retour' AJAX se trouve dans 'data'    
    $.post("ajax5.php", parameters, function(data) {
        /* on selectionne la div 'id 'resultat'  pour coller le tableau ($tab['resultat']) definit dans la page ajax4.php */
        $('#resultat').html(data.resultat);
    }, 'json');
}
}); 