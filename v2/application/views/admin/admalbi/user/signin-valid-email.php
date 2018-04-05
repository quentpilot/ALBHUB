<div class="page login-page">
  <div class="container d-flex align-items-center">
    <div class="form-holder has-shadow">
      <div class="row">
        <!-- Logo & Information Panel-->
        <div class="col-lg-6">
          <div class="info d-flex align-items-center">
            <div class="content">
              <div class="logo">
                <h1>Validation de votre inscription</h1>
              </div>
              <p>
                Veuillez confirmer votre inscription afin de<br>
                valider votre compte et ainsi accéder à l'espace d'administration
              </p>
            </div>
          </div>
        </div>
        <!-- Form Panel    -->
        <div class="col-lg-6 bg-white">
          <div class="form d-flex align-items-center">
            <div class="content">

              <?= validation_errors() ?>

              <?= $this->session->flashdata('alert_message') ?>

              <br><br><br><br>
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
