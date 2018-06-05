<section class="tables">
  <div class="container-fluid">
    <div class="row">

      <div class="col-lg-12">
        <div class="card">
          <div class="card-close">
            <div class="dropdown">
              <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
              <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow">
                <a href="#" class="dropdown-item edit" onclick="history.go(0)"> <i class="fa fa-refresh"></i>Rafraîchir</a>
                <a href="{site_url}/admin/manager/items/pages/export" class="dropdown-item edit"> <i class="fa fa-external-link"></i>Exporter</a>
                <a href="#" class="dropdown-item edit"> <i class="fa fa-cog"></i>Paramètres</a>
                <a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Fermer</a>
              </div>
            </div>
          </div>
          <div class="card-header d-flex align-items-center text-center">

            <h3 class="h4">{datatable.title} <small>{datatable.describe}</small></h3>

          </div>

          <div class="card-header d-flex align-items-center text-center">

            <div class="col-md-12">
              <form action="" method="POST">
                <div class="col-md-4  btn-group">
                  <input type="text" id="tb-search" class="form-control" name="tb_search" placeholder="Rechercher un élément" title="rechercher un élément dans le tableau" value="<?php set_value('tb_search') ?>">
                  <button class="btn btn-sm btn-outline-primary" type="submit" disabled> <i class="fa fa-search"></i></button>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="col-md-2 btn-group">
                  <input type="number" id="tb-limit" class="form-control" name="tb_limit" min="0" placeholder="Limite du résultat" title="Limiter le résultat de recherche" value="<?php set_value('tb_limit') ?>">
                  <button class="btn btn-sm btn-outline-primary" type="submit"> <i class="fa fa-stop"></i></button>
                </div>

              </form>
            </div>

          </div>

          <div class="card-body">
            <div class="table-responsive">

              {datatable.output}

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
