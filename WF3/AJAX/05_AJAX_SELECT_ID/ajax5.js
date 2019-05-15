/*on receptionne le DOM auquel on associe la fonction 'ready' qui executera la fonction une fois que le DOM sera chargé completement.*/
$(document).ready(function () {
    $("#submit").click(function (event) {
        event.preventDefault();/*on receptionne le DOM auquel on associe la fonction 'ready' qui executera la fonction une fois que le DOM sera chargé completement.*/
        ajax();// fonction utilisateur executée ci dessous , le nome n'est pas defini, j'aurais pu mettre ce que je veux, pour chaque clic sur le bouton id submit, j'execute la fonction 'ajax()' declarée ci dessous
    });

    function ajax() {
    var prenom = $("#prenom").text();// on selectionne le selecteur id 'prenom' afin de recuperer l'id de l'employé selectionné
    console.log(prenom);

    var parameters = "personne=" + personne;/* on definie les parametres envoyés a la requete AJAX 'aller' qui sera transmise a la requete de suppression PHP dans le fichier ajax5.php*/
    console.log(parameters);

    // La reponse de la requete 'retour' AJAX se trouve dans 'data'    
    $.post("ajax5.php", parameters, function (data) {
        /* on selectionne la div 'id 'resultat'  pour coller le tableau ($tab['resultat']) definit dans la page ajax4.php */
        $('#resultat').html(data.resultat);
    }, 'json');
}
});