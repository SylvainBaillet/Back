$(document).ready(function(){
    $('#submit').click(function(event){
        event.preventDefault();
        ajax();
    });

function ajax()
    {
    var resultat = $('#resultat').val();
    console.log(resultat);
    var parameters = "resultat=" + resultat;
    console.log(parameters);

    $.post("ajax.php", parameters, function (data) {
        /* on selectionne la div 'id 'resultat'  pour coller le tableau ($tab['resultat']) definit dans la page ajax4.php */
        $('#resultat').html(data.resultat);
    }, 'json');
    }    
});