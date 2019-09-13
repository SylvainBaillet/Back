<?php

extract($_POST);
extract($_GET);

require_once("include/init.php");
require_once("include/header.php");
?>

<div class="container" id="mainTravaux">

    <h2>Mes travaux</h2>
    <!-- Accordion bootstrap -->
    <div class="accordion" id="accordionExample">

        <!-- Card accordion 1 -->
        <div class="card cardAccordion" id="ancreWeb">
            <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                 <img src="images/Screenshot_2019-07-17cinemalalucarnecréteil.jpg" class="card-img-top col-md-6 float-left" alt="...">
                 <h2 class="titreTravaux">Web</h2>

                </button>
            </h2>
            </div>

            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">

                <!-- section Web -->
                <section>

                <p>En décembre 2018 j'intègre une formation de 10 mois intégrateur développeur web à Vitry (Lepoles).</p>
                <p>J'y apprends les différents langages de programmation web : HTML, CSS, JavaScript, PHP, SQL ainsi que les bibliothèques et frameworks : JQuery, Bootstrap, Symfony et enfin le CMS Wordpress.</p>
                <p>Junior dans ce domaine et grand débutant avant cette formation, j'y ai appris énormément et j'ai pu mettre mes connaissances en pratique lors de nos évaluations ainsi que lors de mon premier stage en entreprise ou j'ai réalisé et mis en ligne le site du cinéma la Lucarne en wordpress. Cette expérience à été très enrichissante, et beaucoup plus complexe qu'il n'y parait quant à la maitrise de Wordpress et à son déploiement.</p>
                
                <div class="row">   
                    <div class="col-md-2">
                        <i class="fab fa-html5"></i><i class="fab fa-css3-alt"></i><br>
                        <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>    
                        
                    <div class="col-md-2">
                        <i class="fab fa-bootstrap"></i><br>
                        <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    
                    <div class="col-md-2">
                        <i class="fab fa-js-square"></i><br>
                        <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    
                    <div class="col-md-2">
                        <i class="fab fa-php"></i><br>
                        <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    
                    <div class="col-md-2">
                        <i class="fab fa-symfony"></i><br>
                        <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <i class="fab fa-wordpress"></i><br>
                        <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    
                </div>
                
               
                <p>Mes expériences web :</p>

                <!-- card affichage experience web -->
                
                <?php $datacard = $bdd->query("SELECT * FROM cardweb");?>
                <div class="row">
                <?php while($affichCard = $datacard->fetch(PDO::FETCH_ASSOC)):?>
                <div class="card col-md-3 cardWeb" style="width: 18rem;">
                        <img  class="card-img-top" src="<?= $affichCard['photoweb'] ?>" alt="<?= $affichCard['photoweb'] ?>" class="img-thumbnail">
                        <div class="card-body">
                            <h3 class="card-text text-center text-dark"><?= $affichCard['titre'] ?></h3>
                        </div>
                    </div>
                <?php endwhile; ?>
                </div>
                <!-- fin row card -->
                <!-- fin card -->
                
                </section>
                <!-- fin section Web -->
                
            </div>
            </div>
        </div>

        <hr>
        <!-- Card accordion 2 -->
        <div class="card cardAccordion" id="ancreAudiovisuel">
            <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <img src="images/echo.jpg" class="card-img-top col-md-6 float-right" alt="...">
                <h2>Audiovisuel</h2>

                </button>
            </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
                <!-- section Audiovisuel -->
                <section>

                <p>En 2006, j'ai entammé des études en audiovisuel à Nantes (Cinécreatis) en dominante montage image et son. J'obtiens en 2008 une qualification de niveau 3 en tant que technicien audiovisuel.</p>
                <p>Pendant 2 ans, j'ai appris les techniques de prises de sons, de prises de vues, de signal vidéo, ainsi que le montage son et vidéo.</p>
                <p>Ma passion première étant la musique, je me suis tourné naturellement vers la prise de son et le mixage sur des tournages de courts métrages et documentaires. J'ai participé depuis à différents projets de courts métrages et de clips promotionnels, principalement en tant que preneur de son et mixeur, mais également monteur vidéo.</p>
                <p>Au fur et à mesure de mes expériences, je me suis auto-formé sur les techniques de compositing, notamment sur After Effects et au traitement de l'image et de la photo sur Photoshop.</p>

                </section>
                <!-- fin section Audiovisuel -->
                
            </div>
            </div>
        </div>
        <hr>
        <!-- Card accordion 3 -->
        <div class="card cardAccordion" id="ancrePhoto">
            <div class="card-header" id="headingThree">
            <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <img src="images/56985491_2311448012246567_5611965360291971072_n.jpg" class="card-img-top col-md-6 float-left" alt="...">
                <h2>Photographie</h2>

                </button>
            </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
                <!-- section Photo -->
                <section >  

                <p>Récemment je me suis passionné pour la photographie. Et le traitement numérique.</p>
                <p>c'est une dicipline qui m'apporte beaucoup, tant pour le plaisir simple de faire de la photo que dans les projets professionnels, le web et l'audiovisuel.</p>
                <p>J'aime avoir cette carte qui me permet d'apporter ma propre touche et mes propres clichés sur mes réalisations.</p>
                <p>quelques exemples de mes photos :</p>

                <?php $data = $bdd->query("SELECT * FROM photo");?>

                <?php while($affichPhoto = $data->fetch(PDO::FETCH_ASSOC)):?>

                <img src="<?=$affichPhoto['photo']?>" class="imgTravaux col-md-3 petite">
                <?php endwhile; ?>
                
                
                </section>
                <!-- fin section Photo -->
                
            </div>
            </div>
        </div>
        <hr>
        <!-- Card accordion 4 -->
        <div class="card cardAccordion" id="ancreMusique">
            <div class="card-header" id="headingFour">
            <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                <img src="images/bandmusic.jpg" class="card-img-top col-md-6 float-right" alt="...">
                <h2>Musique</h2>

                </button>
            </h2>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
            <div class="card-body">
                <!-- section Musique -->
                <section>
                <p>Depuis mon adoléscence je suis passionné par la musique. J'ai principalement pratiqué la guitare et participé à plusieurs projets de groupes, plus particulièrement dans le métal et la fusion mais également dans la musique éléctronique.</p>
                <p>En parrallèle je me suis formé à la MAO et j'aime composer des musiques orchestrales et mélanger les genres, symphoniques, éléctro, musiques du monde, rap, jazz etc...</p>
                <p>C'est cette passion pour la musique qui m'a amené naturellement vers la prise de son audiovisuelle et qui m'a beaucoup aidé pour faire du bruitage et du sound design.</p>

                </section>   
                <!-- fin section Musique -->
               
            </div>
            </div>
        </div>
        <div class="grande">
                </div>





        
        


        

        

        
    </div>
    <!-- fin container mainTravaux-->
</div>
<!-- fin Accordion bootstrap -->

<!-- include footer -->
<?php
require_once("include/footer.php");
?>