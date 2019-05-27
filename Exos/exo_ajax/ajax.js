$(document).ready(function(){
    $('#submit').click(function(event){
        event.preventDefault();
        ajax();// ici  on a mis ajax, comme nom de fonction mais il est preferable de l'appeller par un nom qui sera parlant pour l'execution de notre fonction
    });

function ajax()
    {
    var resultat = $('#resultat').val();
    console.log(resultat);
    var parameters = "resultat=" + resultat;
    console.log(parameters);

    $.post("ajax.php", parameters, function (data){
        /* on selectionne la div 'id 'resultat'  pour coller le tableau ($tab['resultat']) definit dans la page ajax4.php */
        $('#resultat').html(data.resultat);
    }, 'json');
    }    
});