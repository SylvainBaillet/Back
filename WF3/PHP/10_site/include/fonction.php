<?php
// --------------Fonction MEMBRE----------------------
 function internauteEstConnecte() /* fonction  qui indique si le membre est connecté*/
    {
        if(!isset($_SESSION['membre'])) /* Si l'indice membre n'est pas defini dans la session, cela veut dire que l'internaute n'est pas passé dans la page connection (n'est pas connecté) */
        {
            return false;
        }
        else// sinon l'indice membre est definit, on retourne true
        {
            return true;
        }
    }

//-----------Fontion ADMIN--------------------------

function internauteEstConnecteEtAdmin()
{
    if(internauteEstConnecte() && $_SESSION['membre']['statut'] == 1)/* Si la session du membre est definie et que son statut est à 1 cela veut dire qu'il est bien ADMIN et qu'il est bien connecté */
    {
        return true;
    }
    else
    {
        return false;
    }
}

?>