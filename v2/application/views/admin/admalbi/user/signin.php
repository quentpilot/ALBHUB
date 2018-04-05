<div class="page login-page">
  <div class="container d-flex align-items-center">
    <div class="form-holder has-shadow">
      <div class="row">
        <!-- Logo & Information Panel-->
        <div class="col-lg-6">
          <div class="info d-flex align-items-center">
            <div class="content">
              <div class="logo">
                <h1>Inscription</h1>
              </div>
              <p>Veuillez vous inscrire<br>afin d'accéder à l'espace d'administration</p>
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
                  <label for="username" class="label-material">Nom d'utilisateur *</label>
                </div>
                <div class="form-group">
                  <input id="firstname" type="text" name="firstname" class="input-material" value="<?= set_value('firstname') ?>">
                  <label for="firstname" class="label-material">Prénom *</label>
                </div>
                <div class="form-group">
                  <input id="lastname" type="text" name="lastname" class="input-material" value="<?= set_value('lastname') ?>">
                  <label for="lastname" class="label-material">Nom de famille *</label>
                </div>
                <div class="form-group">
                  <input id="email" type="email" name="email" class="input-material" value="<?= set_value('email') ?>">
                  <label for="email" class="label-material">adresse email *</label>
                </div>
                <div class="form-group">
                  <input id="password" type="password" name="password" class="input-material" value="<?= set_value('password') ?>">
                  <label for="password" class="label-material">Mot de passe *</label>
                </div>
                <div class="form-group">
                  <input id="confirm_password" type="password" name="confirm_password" class="input-material" value="<?= set_value('confirm_password') ?>">
                  <label for="confirm_password" class="label-material">Confirmation du mot de passe *</label>
                </div>
                <div class="form-group">
                  <input id="invite_token" type="password" name="invite_token" class="input-material" value="<?= set_value('invite_token') ?>">
                  <label for="invite_token" class="label-material">Code d'invitation *</label>
                </div>
                <button type="submit" id="login-submit" name="submit" class="btn btn-primary">Inscription</button>
              </form>
              <br><br>
              <a href="{site_url}/admin/user/login" class="forgot-pass">Déjà inscrit ?</a>
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
