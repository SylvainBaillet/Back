<?php

function adminConnecte()
    {
        if($_SESSION['membre']['statut'] == 1)
            {
                return true;
            }
        else
            {
                return false;
            }    
    }