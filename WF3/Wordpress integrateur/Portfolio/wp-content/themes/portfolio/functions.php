<?php
add_action('widgets_init', 'portfolio_init_sidebar');
/* ici avec la fonction wp 'add_action' on créé ce qu'on appelle un hook en informatique, on accroche une fonction de wordpress pour pouvoir s'en servir
widgets.init est une fonction native de wp, 'portfolio_init_sidebar' est une fonction que j'ai créé
*/

add_action('init', 'portfolio_init_menu'); //add_action est une fonction principale de wordpress , on créé un hook, on accroche la fonction init  qui permet de recuperer les fonctionalités du menu wordpress dans le backoffice

/* fonction permettant de creer des regions, on les retrouve dans le back office de wordpress dans apparences-widgets */
function portfolio_init_sidebar()
{
    /* fonction wordpress permettant de creer une region que l'on retrouve dans les widgets, ici on a mis 3 indices de ma region, mais on peut en mettre plus */
    register_sidebar(array(
        'name' => __('haut-gauche', 'Portolio'),
        'id' => 'haut-gauche',
        'description' => __('region en haut a gauche', 'Portfolio')
    ));

     // exo: creer les differentes regions manquantes: haut-centre, haut-droit, entetes, bas-gauche, bas_centre, bas-droit.
    register_sidebar(array(
        'name' => __('haut-centre', 'Portolio'),
        'id' => 'haut-centre',
        'description' => __('region en haut au centre', 'Portfolio')
    ));
    register_sidebar(array(
        'name' => __('haut-droite', 'Portolio'),
        'id' => 'haut-droite',
        'description' => __('region en haut a droite', 'Portfolio')
    ));
    register_sidebar(array(
        'name' => __('entetes', 'Portolio'),
        'id' => 'entetes',
        'description' => __('region en entete', 'Portfolio')
    ));
    register_sidebar(array(
        'name' => __('bas-gauche', 'Portolio'),
        'id' => 'bas-gauche',
        'description' => __('region en bas a gauche', 'Portfolio')
    ));

    register_sidebar(array(
        'name' => __('bas-centre', 'Portolio'),
        'id' => 'bas-centre',
        'description' => __('region en bas au centre', 'Portfolio')
    ));
    register_sidebar(array(
        'name' => __('bas-droite', 'Portolio'),
        'id' => 'bas-droite',
        'description' => __('region en bas a droite', 'Portfolio')
    ));   
}

/* fonction qui permet de creer le menu principal du theme portfolio que nous avons ensuite positionné dans le code */
function portfolio_init_menu()
{
    register_nav_menu('primary', __('Primary Menu', 'Portfolio'));
}

?>