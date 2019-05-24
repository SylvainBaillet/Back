/*on receptionne le DOM auquel on associe la fonction 'ready' qui executera la fonction une fois que le DOM sera chargé completement.*/
$(document).ready(function(){ 
    /* on selectionne le boutton 'submit' auquel on associe l'evenement 'click'. 'event' correspond a l'évenement 'click' */ 
    $('#submit').click(function(event){
        event.preventDefault(); /* PrevenDefault est une fonction predefinie qui permet d'annuler le comportement du bouton 'submit' qui a pour role de recharger la code / la page. */ 
        ajax(); // fonction utilisateur executée ci dessous , le nom n'est pas defini, j'aurais pu mettre ce que je veux
    });

    function ajax()
    {   
        var personne = $('#personne').val(); // on selectionne le champs 'input' afin de récuperer la valeur saisie dans le champ grace à la methode 'val()' pour la transmettre a la requete aller AJAX
        console.log(personne); 

        var parameters = "personne=" + personne;/* On definie les parametres à envoyer avec la requete 'aller' AJAX. 'personne=' permet de definir ou le parametre va être envoyé dans le fichier PHP, donc dans $personne */ 
        console.log(parameters);

        /* La methode 'post' JQUERY  permet d'envoyer des requetes HTTP AJAX, plusieurs parametres:
        
        1 - l'url de destination des requetes AJAX
        2 - les parametres a fournir a la requete
        3 - En cas de succes, function(data) Recupere les données de la Requete 'retour, tout se trouve dans 'data'
        4 - type de transport de données: JSON*/
        $.post("ajax2.php", parameters, function(data){//post est une requete 
            $('#resultat').html(data.resultat);/* on selectionne la div id 'resultat'et on accroche le message d'erreur ou de validation à l'intérieur. 
            'data.resultat' --> resultat correspondant a l'indice 'resultat' du tablau array $tab['resultat'] du fichier ajax2.php*/
            $('#personne').val(''); // permet de vider le champs input une fois le formulaire validé
        },'json');
    }
