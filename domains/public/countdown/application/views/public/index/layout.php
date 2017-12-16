<!DOCTYPE html>
<html class="no-js">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ALB Impression | Prochaine sortie du site</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap and Font Awesome css-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Google fonts-->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,700">
    <!-- Theme stylesheet-->
    <link rel="stylesheet" href="<?= site_url("$template/css/style.default.css") ?>" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?= site_url("$template/css/custom.css") ?>">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?= site_url("$template/favicon.png") ?>">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div style="background-image: url('<?= site_url("$template/img/Mars-NASA.jpg") ?>')" class="main"> 
      <div class="overlay"></div>
      <div class="container">
        <p class="social"><a href="#" title="" class="facebook"><i class="fa fa-facebook"></i></a><a href="#" title="" class="twitter"><i class="fa fa-twitter"></i></a><a href="#" title="" class="gplus"><i class="fa fa-google-plus"></i></a><a href="#" title="" class="instagram"><i class="fa fa-instagram"></i></a></p>
        <div class="row">
          <div class="col-sm-12">
            <h1 class="cursive">Compte à rebours<br> ALB Impression</h1>
            <h2 class="sub">On vous envoie des retours régulièrement</h2>
          </div>
        </div>
        <!-- countdown-->
        <div id="countdown" class="countdown">
          <div class="row">
            <div class="countdown-item col-sm-3 col-xs-6">
              <div id="countdown-days" class="countdown-number">&nbsp;</div>
              <div class="countdown-label">days</div>
            </div>
            <div class="countdown-item col-sm-3 col-xs-6">
              <div id="countdown-hours" class="countdown-number">&nbsp;</div>
              <div class="countdown-label">hours</div>
            </div>
            <div class="countdown-item col-sm-3 col-xs-6">
              <div id="countdown-minutes" class="countdown-number">&nbsp;</div>
              <div class="countdown-label">minutes</div>
            </div>
            <div class="countdown-item col-sm-3 col-xs-6">
              <div id="countdown-seconds" class="countdown-number">&nbsp;</div>
              <div class="countdown-label">seconds</div>
            </div>
          </div>
        </div>
        <!-- /.countdown-->
        <div class="mailing-list">
          <h3 class="mailing-list-heading">Tenez-vous informer des prochaines sorties des sites web</h3>
          <div class="row">
            <form class="form-inline">
              <div class="form-group">
                <label for="email" class="sr-only"></label>
                <input type="email" name="email" placeholder="bonjour.bonheur@paradise.space" id="email" class="form-control transparent input-lg">
              </div>
              <button class="btn btn-info btn-lg" disabled="disabled">S'inscrire à la newsletter</button>
            </form>
          </div>
        </div>
      </div>
      <div class="footer">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <p>&copy;2017 ALB Impression, la publicité par l'image</p>
            </div>
            <div class="col-md-6">
              <p class="credit">Developed by <a href="https://pilotaweb.fr" target="_blank">PilotaWeb</a></p>
              <br>
              <!-- please do not remove credit to us, if you need to remove the link please donate to support further theme's development-->
              <p class="credit">Template by <a href="https://bootstrapious.com/landing-pages" target="_blank">Bootstrapious</a>
                <br />with support from <a href="https://fity.cz/" target="_blank">Fity</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- JAVASCRIPT FILES -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="javascripts/vendor/jquery-1.11.0.min.js"><\/script>')</script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="<?= site_url("$template/js/jquery.cookie.js") ?>"></script>
    <script src="<?= site_url("$template/js/jquery.countdown.min.js") ?>"></script>
    <script src="<?= site_url("$template/js/front.js") ?>"></script>
  </body>
</html>