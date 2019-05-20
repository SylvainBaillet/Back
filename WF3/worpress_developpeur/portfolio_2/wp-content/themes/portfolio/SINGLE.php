<?php
get_header()/* fonctions propres a wordpress, permet d'inclure le haut du site, je prends le header.php et le colle ici */
?>



<!--  La condition if permet de verifier si des articles ont été postés! si oui, la boucle while tant qu'il y'a des articles, je poste (the_post)-->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 

<!-- ce h2 permet d'fficher le titre de l'article et son permalink (the_permalink) -->
<h2 class="display-4 text-center mt-3 text-dark"><a href="<?php the_permalink(); ?> "><?php the_title(); ?></a></h2>



 <!-- Affiche le corps (Content) de l'Article dans un bloc div. -->
 <div class="container"> <!-- je changer la class entry en container -->
 <!-- Affiche la Date. -->
 <small><?php the_time('F jS, Y'); ?></small>
   <?php the_content(); ?>
 </div>

<?php endwhile; else: ?>

<!-- on tombe dans la condition else dans le cas ou aucun article n'a été posté -->
<p>Contenu non trouvé !</p>

<?php endif; ?>

<?php
get_footer()/* fonctions propres a wordpress, permet d'inclure le bas footer, je prends le footer.php et le colle ici */
?>