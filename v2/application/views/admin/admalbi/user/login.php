<div class="page login-page">
  <div class="container d-flex align-items-center">
    <div class="form-holder has-shadow">
      <div class="row">
        <!-- Logo & Information Panel-->
        <div class="col-lg-6">
          <div class="info d-flex align-items-center">
            <div class="content">
              <div class="logo">
                <h1>Connexion</h1>
              </div>
              <p>Veuillez Entrer vos identifiants<br>afin d'accéder à l'espace d'administration</p>
            </div>
          </div>
        </div>
        <!-- Form Panel    -->
        <div class="col-lg-6 bg-white">
          <div class="form d-flex align-items-center">
            <div class="content">

              <?= validation_errors() ?>

              <?php //if (($message = !is_null($this->session->flashdata('message')))) : ?>
                <?= $this->session->flashdata('alert_message') ?>
              <?php //endif ?>

              <br><br>
              <form id="" action="" method="post">
                <div class="form-group">
                  <input id="username" type="text" name="username" class="input-material" value="<?= set_value('username') ?>">
                  <label for="username" class="label-material">Nom d'utilisateur ou adresse email</label>
                </div>
                <div class="form-group">
                  <input id="password" type="password" name="password" class="input-material" value="<?= set_value('password') ?>">
                  <label for="password" class="label-material">Mot de passe</label>
                </div>
                <button type="submit" id="login-submit" name="submit" value="login" class="btn btn-primary">Connexion</button>
              </form>
              <br><br>
              <a href="{site_url}/admin/user/forget-password" class="forgot-pass">Mot de passe oublié ?</a>
              <br><br>
              Pas encore inscrit ? <a href="{site_url}/admin/user/signin" class="signup">S'inscrire</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="copyrights text-center">
    <p>
      Developed by <a href="https://pilotaweb.fr" class="external">PilotaWeb</a>
      &nbsp;&nbsp;&&nbsp;&nbsp;
      Designed by <a href="https://bootstrapious.com/admin-templates" class="external">Bootstrapious</a>
      <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
    </p>
  </div>
</div>
