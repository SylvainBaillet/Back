<?php
require_once("include/init.php");
require_once("include/header.php");
?>

    <h1 class="display-2 offset-md-4 titre1">Bienvenue sur mon Portfolio</h1>
    
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="images/slid1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="images/slid2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="images/slid3.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="images/slid4.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="images/slid5.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="images/slid6.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="images/slid7.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div><!-- fin carousel -->

    <!-- debut section -->
    <section class="container" id="container1">

        <div class="jumbotron" id="jt1">
            
            <marquee behavior="scroll" direction="left" scrollamount="5">
            <h1 class="display-4">Bienvenue sur mon portfolio!</h1>
            </marquee>
            
                <p class="lead">Ici , Je vous parle de mon parcours, de mes compétences et travaux, de mes loisirs. Bonne navigation à tous !</p>
                <hr class="my-4">
                <h2>Mes différents domaines de compétences</h2>
                
            <div id="cards">

                <div class="row">

                        <!-- card 1 -->
                        <div class="card col-md-3" id="card1" style="width: 18rem;">
                            <a href="travaux.php#ancreWeb">
                            <img src="images/Screenshot_2019-07-17 cinema la lucarne créteil – Un site utilisant WordPress.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">intégration & développement web</p>
                            </div>
                            </a>  
                        </div>  
                        
                        <!-- card 2 -->
                        <div class="card col-md-3 order-md-4" id="card2" style="width: 18rem;">
                            <a href="travaux.php#ancreAudiovisuel">
                            <img src="images/Screenshot_2019-07-17 cinema la lucarne créteil – Un site utilisant WordPress.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">Audiovisuel</p>
                            </div>  
                            </a>      
                        </div>

                        <!-- card 3 -->
                        <div class="card col-md-3 order-md-4" id="card3" style="width: 18rem;">
                            <a href="travaux.php#ancrePhoto">
                            <img src="images/Screenshot_2019-07-17 cinema la lucarne créteil – Un site utilisant WordPress.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">Photographie</p>
                            </div>    
                            </a>   
                        </div>

                        <!-- card 4 -->
                        <div class="card col-md-3 order-md-4" id="card4" style="width: 18rem;">
                            <a href="travaux.php#ancreMusique">
                            <img src="images/Screenshot_2019-07-17 cinema la lucarne créteil – Un site utilisant WordPress.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">Musique</p>
                            </div>  
                            </a>     
                        </div>
                </div> 
                <!-- fin row 1 -->
            </div> 
             <!-- fin div cards1 -->
        
        </div>
        <!-- fin jumbotron jt1 -->

            <div class="row">
                <div class="jumbotron" id="jt2">
                    <h1 class="display-4">Hello, world!</h1>
                    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                    <hr class="my-4">
                    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                </div>
                <!-- fin jumbotron jt2 -->
            
            </div>
            <!-- fin row 2 -->
            
    </div>
    <!-- fin div container1 -->
    
<?php
require_once("include/footer.php");
?>

