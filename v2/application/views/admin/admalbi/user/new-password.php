<div class="page login-page">
  <div class="container d-flex align-items-center">
    <div class="form-holder has-shadow">
      <div class="row">
        <!-- Logo & Information Panel-->
        <div class="col-lg-6">
          <div class="info d-flex align-items-center">
            <div class="content">
              <div class="logo">
                <h1>Nouveau mot de passe</h1>
              </div>
              <p>Veuillez entrer votre nouveau mot de passe<br>afin d'accéder à l'espace d'administration</p>
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
                  <input id="password" type="password" name="password" class="input-material" value="<?= set_value('password') ?>">
                  <label for="password" class="label-material">Mot de passe</label>
                </div>
                <div class="form-group">
                  <input id="confirm_password" type="password" name="confirm_password" class="input-material" value="<?= set_value('confirm_password') ?>">
                  <label for="confirm_password" class="label-material">Confirmation du mot de passe</label>
                </div>
                <button type="submit" id="login-submit" name="submit" class="btn btn-primary">Enregister</button>
              </form>
              <br><br>
              <a href="{site_url}/admin/user/login" class="forgot-pass">Me connecter</a>
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
