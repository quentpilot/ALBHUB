<div class="{form.class.col}">
  <div class="card">
    <div class="card-close">
      <div class="dropdown">
        <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
        <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow">
          <a href="#" class="dropdown-item edit" onclick="history.go(0)"> <i class="fa fa-refresh"></i>Rafraîchir</a>
          <a href="#" class="dropdown-item edit"> <i class="fa fa-cog"></i>Paramètres</a>
          <a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Fermer</a>
        </div>
      </div>
    </div>

    <div class="card-header d-flex align-items-center">
      <h3 class="h4">{form.title}</h3>
    </div>
    <div class="card-body">
      <p>{form.describe}</p>

      {form.output}

    </div>
  </div>
</div>
