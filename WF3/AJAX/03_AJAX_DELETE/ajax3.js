/*on receptionne le DOM auquel on associe la fonction 'ready' qui executera la fonction une fois que le DOM sera chargé completement.*/
$(document).ready(function() {
  /* on selectionne le boutton 'submit' auquel on associe l'evenement 'click'. 'event' correspond a l'évenement 'click' */
  $("#submit").click(function(event) {
      event.preventDefault();/*on receptionne le DOM auquel on associe la fonction 'ready' qui executera la fonction une fois que le DOM sera chargé completement.*/
      ajax();// fonction utilisateur executée ci dessous , le nome n'est pas defini, j'aurais pu mettre ce que je veux
  });

  function ajax() {
    var id = $("#employe").val();
    console.log(id);

    var parameters = "id="+id;
    console.log(parameters);

    $.post("ajax3.php", parameters, function (data) {
        $("#employes").html(data.resultat);
    }, 'json');
  }
});
