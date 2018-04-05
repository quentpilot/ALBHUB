<div class="page login-page">
  <div class="container d-flex align-items-center">
    <div class="form-holder has-shadow">
      <div class="row">
        <!-- Logo & Information Panel-->
        <div class="col-lg-6">
          <div class="info d-flex align-items-center">
            <div class="content">
              <div class="logo">
                <h1>Mot de passe oublié</h1>
              </div>
              <p>Veuillez entrer votre adresse email<br>afin de créer un nouveau mot de passe</p>
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
                  <input id="email" type="email" name="email" class="input-material" value="<?= set_value('email') ?>">
                  <label for="email" class="label-material">adresse email</label>
                </div>
                <button type="submit" id="login-submit" name="submit" class="btn btn-primary">Réinitialiser le mot de passe</button>
              </form>
              <br><br>
              La mémoire est de retour ? <a href="{site_url}/admin/user/login" class="signup">Me connecter</a>
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
