<?php //print_r($data_nav_menu) ?>
<?php //debug($data_list) ?>
<section class="tables">
  <div class="container-fluid">
    <div class="row">

      <div class="col-lg-12">
        <div class="card">
          <div class="card-close">
            <div class="dropdown">
              <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
              <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Fermer</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Rafraîchir</a></div>
            </div>
          </div>
          <div class="card-header d-flex align-items-center text-center">

            <h3 class="h4">Datatable manager</h3>

          </div>

          <div class="card-header d-flex align-items-center text-center">

            <div class="col-md-12">
              <form action="" method="POST">
                <div class="col-md-4  btn-group">
                  <input type="text" id="tb-search" class="form-control" name="tb_search" placeholder="Rechercher un élément" title="rechercher un élément dans le tableau" value="<?php set_value('tb_search') ?>">
                  <button class="btn btn-sm btn-outline-primary" type="submit"> <i class="fa fa-search"></i></button>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="col-md-2 btn-group">
                  <input type="number" id="tb-limit" class="form-control" name="tb_limit" min="1" placeholder="Limite du résultat" title="Limiter le résultat de recherche" value="<?php set_value('tb_limit') ?>">
                  <button class="btn btn-sm btn-outline-primary" type="submit"> <i class="fa fa-stop"></i></button>
                </div>

              </form>
            </div>

          </div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover">

                <!-- load datatable header -->
                <thead>

                  <?php $tb_rows = $data_list['head'] ?>

                  <?php foreach ($tb_rows as $key => $row): ?>

                    <?php $tb_order_by = ($key == $this->input->post('tb_order_by')) ? $key . ' DESC' : $key ?>
                    <th>
                      <form action="" method="POST">
                        <input type="hidden" id="<?= 'id_' . $key ?>" name="tb_order_by" value="<?= $tb_order_by ?>">
                        <button class="btn btn-sm btn-outline-primary" type="submit" title="Trier le résultat de recherche par <?= $row ?>"> <?= $row ?> &nbsp; <i class="fa fa-sort"></i></button>
                      </form>
                    </th>

                  <?php endforeach; ?>

                  <?php if (!empty($data_list['action'])) : ?>

                    <th>
                      <button class="btn btn-sm btn-outline-primary" type="submit"> Action &nbsp; <i class="fa fa-gear"></i></button>
                    </th>

                  <?php endif; ?>

                </thead>

                <!-- load datatable body -->
                <tbody>

                <?php
                  foreach ($data_list['body'] as $key => $entity) {
                      $tb_key = $entity->get('tb_primary_key');
                  ?>

                      <tr>

                        <!-- build requested table columns -->
                        <?php $it = 0; ?>
                        <?php foreach ($data_list['head'] as $key => $col) : ?>
                          <?php if ($it == 0) : ?>
                            <th scope="row" ><?= $entity->get($entity->get($key)) ?></th>
                          <?php elseif ($it > 0) : ?>
                            <td><?= $entity->get($key) ?></td>
                          <?php endif; ?>
                          <?php $it++ ?>
                        <?php endforeach; ?>

                        <!-- build action tools column -->
                        <td>
                          <?php foreach ($data_list['action'] as $type => $config) {
                            $tb_col = (!isset($config['col']) || !is_null($config['col'])) ? $tb_key : $config['col'];
                            $btn_class = (!isset($config['col']) || !is_null($config['col'])) ? '' : $config['class'];

                            $action = '

                            <a class="btn btn-' . $config['level'] . ' btn-sm ' . $btn_class . '"

                              href="' . $config['url'] . '/' . $type . '/' . $entity->get($tb_col) .

                              '" type="button"' .

                              'target="' . $config['target'] .

                              '" title="' . $config['title'] . '">

                              <i class="' . $config['icon'] . '"></i>

                            </a>

                            &nbsp;&nbsp;';

                            echo $action;
                          }
                          ?>
                        </td>

                      </tr>

                  <?php } ?>

                </tbody>

              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
