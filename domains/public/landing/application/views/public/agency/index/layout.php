<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ALB Impression | La Publicité par l'Image !</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap and Font Awesome css-->
    <!-- we use cdn but you can also include local files located in css directory-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- Google fonts - Roboto Condensed for headings, Open Sans for copy-->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300,700%7COpen+Sans:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?= site_url("$template/css/style.default.css") ?>" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?= site_url("$template/css/custom.css") ?>">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?= site_url("$template/favicon.png") ?>">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body data-spy="scroll" data-target="#navigation" data-offset="120">
    <!-- intro-->
    <section id="intro" class="intro image-background">
      <div class="overlay"></div>
      <div class="content">
        <div class="container clearfix">
          <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-12">
              <p class="roboto">Bienvenue dans nos locaux</p>
              <h1>ALB<br /><span class="bold">Impression</span></h1>
              <p class="roboto text-center">Nous trouvons la meilleure qualité pour nos produits, tout en satisfaisant votre porte monnaie
                <br><br><a href="http://shop.albimpression.fr" class="external">Découvrez nos produits - ALB Shop</a></p>
            </div>
          </div>
        </div>
      </div><a href="#about" class="icon faa-float animated scroll-to"><i class="fa fa-angle-double-down"></i></a>
    </section>
    <!-- navbar-->
    <header class="header">
      <div class="sticky-wrapper">
        <div role="navigation" class="navbar navbar-default">
          <div class="container">
            <div class="navbar-header">
              <button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="#intro" class="navbar-brand scroll-to"><img src="img/logo.png" alt=""></a>
            </div>
            <div id="navigation" class="collapse navbar-collapse">
              <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="#intro">L'Agence</a></li>
                <li><a href="#about">A Propos </a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#portfolio">Réalisations</a></li>
                <li><a href="#contact">Contact</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- /.navbar-->
    <!-- about us-->
    <section id="about">
      <div class="container clearfix">
        <div class="row margin-bottom">
          <div class="col-md-6 margin-bottom"> 
            <h2 class="heading">A propos <small>ALB Impression</small></h2>
            <p class="lead text-center">Nous réalisons vos idées<br> grâce à l'impression numérique <br>sur tous support</p>
            <p>ALB Impression est une enseigne d'impression publicitaire.<br>
              Nous utilisons différents procédés afin de garantir une durabilité du produit.

            </p>
            <div class="row">
              <div class="col-sm-6">
                <ul>
                  <li>Materialisation du modèle</li>
                  <li>Impression du rendu souhaité</li>
                  <li>Finissions à la main</li>
                </ul>
              </div>
              <div class="col-sm-6">
                <ul>
                  <li>Modèle informatique</li>
                  <li>Numérique | Sérigraphie</li>
                  <li>Vérification du rendu</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 margin-bottom">
            <p><img src="<?= site_url("$template/img/template-homepage.png") ?>" alt="" class="img-responsive"></p>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <h5><i class="fa fa-arrows"></i>Effects present letters inquiry no an removed or friends.</h5>
            <p>Able an hope of body. Any nay shyness article matters own removal nothing his forming.</p>
          </div>
          <div class="col-sm-6">
            <h5> <i class="fa fa-image"></i>Effects present letters inquiry no an removed or friends.</h5>
            <p>Able an hope of body. Any nay shyness article matters own removal nothing his forming.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <h5><i class="fa fa-life-ring"></i>Effects present letters inquiry no an removed or friends.</h5>
            <p>Able an hope of body. Any nay shyness article matters own removal nothing his forming.</p>
          </div>
          <div class="col-sm-6">
            <h5> <i class="fa fa-trophy"></i>Effects present letters inquiry no an removed or friends.</h5>
            <p>Able an hope of body. Any nay shyness article matters own removal nothing his forming.</p>
          </div>
        </div>
      </div>
    </section>
    <!-- services-->
    <section id="services" class="section-gray">
      <div class="container clearfix">
        <div class="row services">
          <div class="col-md-12">
            <h2 class="heading">Services <small>Nos savoir-faire</small></h2>
            <div class="row">
              <div class="col-sm-4">
                <div class="box box-services">
                  <div class="icon"><i class="ti-desktop"></i></div>
                  <h4 class="heading">Sérigraphie</h4>
                  <p class="lead">Depuis 25 ans, nous utilisons la sérigraphie pour certains de nos projets<br>
                    Une méthode efficace et durable pour les textiles !
                  </p>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="box box-services">
                  <div class="icon"><i class="ti-printer"></i></div>
                  <h4 class="heading">Impression Numérique</h4>
                  <p class="lead">Grâce aux avancées technologiques, l'impression numérique étend les possibilités de création !<br>
                  Avis aux amateurs de grands formats</p>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="box box-services">
                  <div class="icon"><i class="ti-search"></i></div>
                  <h4 class="heading">Reproductions</h4>
                  <p class="lead">Reproduction d'images, tableau, enseignes<br>
                  </p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <div class="box box-services">
                  <div class="icon"><i class="ti-comments"></i></div>
                  <h4 class="heading">Poses adhésives</h4>
                  <p>Poses adhésives ultra résistantes sur la vitrine de votre commerce, tout comme sur les carrosseries</p>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="box box-services">
                  <div class="icon"><i class="ti-email"></i></div>
                  <h4 class="heading">Infographie</h4>
                  <p>Montage numérique avant l'impression de votre commande.</p>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="box box-services">
                  <div class="icon"><i class="ti-layout-sidebar-left"></i></div>
                  <h4 class="heading">Artisanat</h4>
                  <p>Une qualité inégalée pour un coût raisonnable face à l'industrie</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- portfolio-->
    <section id="portfolio" class="no-padding-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="heading">Nos produits</h2>
            <p class="text-center">Quelque-unes de nos réalisations.<br>
              Découvrez-en plus sur notre <a href="http://portfolio.albimpression.fr" class="external">portfolio en ligne</a></p>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row no-space">
          <div class="col-sm-4 col-md-3">
            <div class="box"><a href="#" title=""><img src="<?= site_url("$template/img/portfolio-1.jpg") ?>" alt="" class="img-responsive"></a></div>
          </div>
          <div class="col-sm-4 col-md-3">
            <div class="box"><a href="#" title=""><img src="<?= site_url("$template/img/portfolio-7.jpg") ?>" alt="" class="img-responsive"></a></div>
          </div>
          <div class="col-sm-4 col-md-3">
            <div class="box"><a href="#" title=""><img src="<?= site_url("$template/img/portfolio-3.jpg") ?>" alt="" class="img-responsive"></a></div>
          </div>
          <div class="col-sm-4 col-md-3">
            <div class="box"><a href="#" title=""><img src="<?= site_url("$template/img/portfolio-5.jpg") ?>" alt="" class="img-responsive"></a></div>
          </div>
          <div class="col-sm-4 col-md-3">
            <div class="box"><a href="#" title=""><img src="<?= site_url("$template/img/portfolio-4.jpg") ?>" alt="" class="img-responsive"></a></div>
          </div>
          <div class="col-sm-4 col-md-3">
            <div class="box"><a href="#" title=""><img src="<?= site_url("$template/img/portfolio-6.jpg") ?>" alt="" class="img-responsive"></a></div>
          </div>
          <div class="col-sm-4 col-md-3">
            <div class="box"><a href="#" title=""><img src="<?= site_url("$template/img/portfolio-2.jpg") ?>" alt="" class="img-responsive"></a></div>
          </div>
          <div class="col-sm-4 col-md-3">
            <div class="box"><a href="#" title=""><img src="<?= site_url("$template/img/portfolio-8.jpg") ?>" alt="" class="img-responsive"></a></div>
          </div>
        </div>
      </div>
    </section>
    <!-- team-->
    <section id="team">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="heading">Nos Clients</h2>
            <div class="row"></div>
            <!-- team-member-->
            <div class="col-md-3 col-sm-6">
              <div class="team-member">
                <div class="image"><a href="#"><img src="<?= site_url("$template/img/person-1.jpg") ?>" alt="" title="Site internet" class="img-responsive"></a></div>
                <h3><a href="http://client.albimpression.fr/han-solo" target="_blank" title="Profil Client">Han Solo</a></h3>
                <p class="role">Founder</p>
                <div class="social">
                  <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                  <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                  <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                  <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                </div>
                <div class="text">
                  <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                </div>
              </div>
            </div>
            <!-- team-member col end-->
            <!-- team-member-->
            <div class="col-md-3 col-sm-6">
              <div class="team-member">
                <div class="image"><a href="#"><img src="<?= site_url("$template/img/person-2.jpg") ?>" alt="" class="img-responsive"></a></div>
                <h3><a href="#">Luke Skywalker</a></h3>
                <p class="role">CTO</p>
                <div class="social">
                  <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                  <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                  <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                  <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                </div>
                <div class="text">
                  <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                </div>
              </div>
            </div>
            <!-- team-member col end-->
            <!-- team-member-->
            <div class="col-md-3 col-sm-6">
              <div class="team-member">
                <div class="image"><a href="#"><img src="<?= site_url("$template/img/person-3.jpg") ?>" alt="" class="img-responsive"></a></div>
                <h3><a href="#">Princess Leia</a></h3>
                <p class="role">Team Leader</p>
                <div class="social">
                  <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                  <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                  <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                  <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                </div>
                <div class="text">
                  <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                </div>
              </div>
            </div>
            <!-- team-member col end-->
            <!-- team-member-->
            <div class="col-md-3 col-sm-6">
              <div class="team-member">
                <div class="image"><a href="#"><img src="<?= site_url("$template/img/person-4.jpg") ?>" alt="" class="img-responsive"></a></div>
                <h3><a href="#">Jabba Hut</a></h3>
                <p class="role">Lead Developer</p>
                <div class="social">
                  <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                  <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                  <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                  <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                </div>
                <div class="text">
                  <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                </div>
              </div>
            </div>
            <!-- team-member col end-->
          </div>
        </div>
      </div>
    </section>
    <!-- text-->
    <section id="text" class="section-gray">
      <div class="container clearfix">
        <div class="row">
          <div class="col-md-12">
            <h2 class="heading">Post Scriptum</h2>
            <div class="row">
              <div class="col-sm-6">
                <p>Able an hope of body. Any nay shyness article matters own removal nothing his forming. Gay own additions education satisfied the perpetual. If he cause manor happy. Without farther she exposed saw man led. Along on happy could cease green oh. </p>
                <p>Betrayed cheerful declared end and. Questions we additions is extremely incommode. Next half add call them eat face. Age lived smile six defer bed their few. Had admitting concluded too behaviour him she. Of death to or to being other. </p>
              </div>
              <div class="col-sm-6">
                <p>Effects present letters inquiry no an removed or friends. Desire behind latter me though in. Supposing shameless am he engrossed up additions. My possible peculiar together to. Desire so better am cannot he up before points. Remember mistaken opinions it pleasure of debating. Court front maids forty if aware their at. Chicken use are pressed removed. </p>
                <p>Saw yet kindness too replying whatever marianne. Old sentiments resolution admiration unaffected its mrs literature. Behaviour new set existence dashwoods. It satisfied to mr commanded consisted disposing engrossed. Tall snug do of till on easy. Form not calm new fail. </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- map-->
    <section id="map"></section>
    <section id="contact">
      <div class="container clearfix">
        <div class="row">
          <div class="col-md-12">
            <h2 class="heading">Nous Contacter</h2>
            <div class="row">
              <div class="col-md-6">
                <form id="contact-form" method="post" action="contact.php" class="contact-form form">
                  <div class="controls">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="name">Nom *</label>
                          <input type="text" name="name" id="name" placeholder="Votre nom" required="required" class="form-control input-lg">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="enterprise">Entreprise</label>
                          <input type="text" name="enterprise" id="enterprise" placeholder="Nom de votre entreprise" class="form-control input-lg">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="email">Adresse email *</label>
                      <input type="email" name="email" id="email" placeholder="bonjour.bonheur@asgardia.space" required="required" class="form-control input-lg">
                    </div>
                    <div class="form-group">
                      <label for="message">Votre message *</label>
                      <textarea rows="4" name="message" id="message" placeholder="Que souhaitez-vous nous transmettre ?" required="required" class="form-control"></textarea>
                    </div>
                    <div class="text-center">
                      <input type="submit" value="Envoyer le message" class="btn btn-primary btn-block input-lg">
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-md-6 text-center">
                <p class="lead">N'hésitez pas à nous envoyer un message <br>ou<br> nous contacter par téléphone.</p>
                <p class="lead">Ligne fixe : 03 85 59 06 92</p>
                <p class="lead">Site Internet : <a href="http://albimpression.fr" class="external"> ALB Impression</a></p>
                <br><br><br><br>
                <p class="text-center">Visitez également nos autres sites afin de découvrir nos produits !</p>
                <p class="social"><a href="http://shop.albimpression.fr" title="Notre e-boutique" class="facebook"><i class="fa fa-globe"></i></a>
                  <a href="http://portfolio.albimpression.fr" title="Nos réalisations" class="twitter"><i class="fa fa-sitemap"></i></a>
                  <a href="http://deadline.albimpression.fr" title="Prochainement !" class="instagram"><i class="fa fa-globe"></i></a>
                  <a href="http://client.albimpression.fr" title="Espace Client" class="gplus"><i class="fa fa-user-md"></i></a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer>
      <div class="container">
        <div class="row copyright">
          <div class="col-md-6">
            <p class="roboto">&copy;2017 ALB Impression, la publicité par l'image</p>
          </div>
          <div class="col-md-6">
            <p class="credit roboto"><a href="https://www.bootstrapious.com/tutorials" class="external">Bootstrapious</a></p>
            <!-- Please do not remove the backlink to us unless you support the development at https://bootstrapious.com/donate. It is part of the license conditions. Thanks for understanding :) -->
          </div>
        </div>
      </div>
    </footer>
    <!-- Javascript files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="<?= site_url("$template/js/jquery.sticky.js") ?>"></script>
    <script src="<?= site_url("$template/js/jquery.scrollTo.min.js") ?>"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
    <!-- to use it on your site, change API key for Google Maps -->
    <script src="<?= site_url("$template/js/gmaps.js") ?>"></script>
    <script src="<?= site_url("$template/js/jquery.cookie.js") ?>"></script>
    <script src="<?= site_url("$template/js/front.js") ?>"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='//www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>
  </body>
</html>