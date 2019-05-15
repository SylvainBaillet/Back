/*on receptionne le DOM auquel on associe la fonction 'ready' qui executera la fonction une fois que le DOM sera chargé completement.*/
$(document).ready(function() {
  /* on selectionne le bouton 'submit' auquel on associe l'evenement 'click'. 'event' correspond a l'évenement 'click' */
  $("#submit").click(function(event) {
      event.preventDefault();/*on receptionne le DOM auquel on associe la fonction 'ready' qui executera la fonction une fois que le DOM sera chargé completement.*/
      ajax();// fonction utilisateur executée ci dessous , le nome n'est pas defini, j'aurais pu mettre ce que je veux, pour chaque clic sur le bouton id submit, j'execute la fonction 'ajax()' declarée ci dessous
  });

  function ajax() {
    var id = $("#employe").val();// on selectionne le selecteur id 'personne' afin de recuperer l'id de l'employé selectionné
    console.log(id);

    var parameters = "id="+id;/* on definie les parametres envoyés a la requete AJAX 'aller' qui sera transmise a la requete de suppression PHP dans le fichier ajax3.php*/
    console.log(parameters);

    /* post : methode jquery permettant d'envoyer des requetes AJAX en HTTP : arguments: 1- L'URL de destination des requetes AJAX */
                                                                                      // 2- les parametres envoyés avec la requete AJAX 'aller'
                                                                                      // 3- en cas de succues on receptionne le resultat de la requete AJAX 'retour'
                                                                                      // 4- Type de transport de données 'JSON' 

    $.post("ajax3.php", parameters, function (data) {
      $('#employes').html(data.resultat);/* on selectionne la div id 'employes'et on accroche le message d'erreur ou de validation à l'intérieur. 
            'data.resultat' --> resultat correspondant a l'indice 'resultat' du tablau array $tab['resultat'] du fichier ajax3.php*/
      $('#messSuppr').html(data.message);/* on selectionne la div id 'messSuppr'et on accroche le message à l'intérieur. 
            'data.message' --> resultat correspondant a l'indice 'message' du tablau array $tab['message'] du fichier ajax3.php*/
    }, 'json');
  }
});// la fonction déclarée en premier se termine ici