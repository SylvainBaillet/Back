<?php

if($_POST)
{
    // echo '<pre>'; print_r($_POST); echo '</pre>';
    if(iconv_strlen($_POST['pseudo']) < 3 || iconv_strlen($_POST['pseudo']) > 10)
    {
    echo '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Le pseudo doit contenir entre 3 et 10 caractères</div>';
    }
}

?>