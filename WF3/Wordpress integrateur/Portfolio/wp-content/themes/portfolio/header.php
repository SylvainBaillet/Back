<!DOCTYPE html>
<html  <?php language_attributes();?>> 
<!-- on remplace 'lang=""' par la fonction wordpress language_attributes() qui retourne la langue du site  -->
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <!-- a la place de utf-8 entre les guillemets je place la fonction worpress 'bloginfo()' qui retourne le bon encodage du site -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- lien fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- lien bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/style.css">
    <!-- fonction worpress qui retourne le chemin physqiue de mon adresse portfolio. bloginfo('template_directory') suivi de /style.css -->
    <title><?php bloginfo('name');?></title>
    <!-- avec la fontion bloginfo('name') je pourrais afficher le nom que je veux a partit du back office -->
    <?php wp_head(); ?><!-- wp_head fonction worpress permettant de charger des fichiers indispensables a wordpress, en js, json, css ... et permet de recuperer la sidebar noire en haut de la page , attention elle necessite la presence de la fonction wp 'wp_footer()' pour pouvoir s'afficher-->
</head>
<body <?php body_class();//fait appel a des class de wordpress?>>
   
<div class="container-fluid px-0">

    <div class="d-flex">
        

        <div class="col-md-3 hauteur">
            <!-- dynamic_sidebar() est une fonction wordpress qui permet de faire appel au regions que l'on a créé dans le fichier fonction 'function.php' -->
                <?php dynamic_sidebar('haut-gauche')?>
        </div>
        <div class="col-md-6 hauteur">
                <?php dynamic_sidebar('haut-centre')?>
        </div>
        <div class="col-md-3  hauteur">
                <?php dynamic_sidebar('haut-droite')?>
        </div>
        

    </div>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      

  <a class="navbar-brand" href="#"><?php bloginfo('name');?></a><!-- on rajoute la fonction bloginfo('name') a la place du nom de base dans de la navbar-->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExample04">
    <ul class="navbar-nav mr-auto">
          <!-- wp_nav_menu() est une fonction worpess qui permet d'importer le menu principal que l'on a créé dans le fichier fonction.php
'container_class' => 'menu_header : le menu aura comme class 'menu_header'
'theme_location' => 'primary' permet de precider que c'est le menu principal    
-->
        <?php wp_nav_menu(array('container_class' => 'menu_header', 'theme_location' => 'primary')) ?>
    </ul>
    <form class="form-inline my-2 my-md-0">
      <input class="form-control" type="text" placeholder="Search">
    </form>
  </div>
</nav>

    <div class="col-md-12 px-0 h-entetes">
        <?php dynamic_sidebar('entetes')?>
    </div>

</div>
<section class="ma-section">