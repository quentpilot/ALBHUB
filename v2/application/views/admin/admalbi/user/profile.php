<!-- Client Section-->
<section class="client">
  <div class="container-fluid">
    <div class="row">
      <!-- Client Profile -->
      <div class="col-lg-4">
        <div class="client card">
          <div class="card-close">
            <div class="dropdown">
              <button type="button" id="closeCard2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
              <div aria-labelledby="closeCard2" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
            </div>
          </div>
          <div class="card-body text-center">
            <div class="client-avatar"><img src="{assets_url}/img/{usi_profile_image}" alt="{profile_image}" style="max-height: 120px" class="img-fluid rounded-circle">
              <div class="status bg-green"></div>
            </div>
            <div class="client-title">
              <h3>{usi_firstname} {usi_lastname}</h3><span>{usi_job}</span><a href="#">Follow</a>
            </div>
            <div class="client-info">
              <div class="row">
                <div class="col-4"><strong>20</strong><br><small>Photos</small></div>
                <div class="col-4"><strong>54</strong><br><small>Videos</small></div>
                <div class="col-4"><strong>235</strong><br><small>Tasks</small></div>
              </div>
            </div>
            <div class="client-social d-flex justify-content-between"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a><a href="#" target="_blank"><i class="fa fa-twitter"></i></a><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a><a href="#" target="_blank"><i class="fa fa-instagram"></i></a><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></div>
          </div>
        </div>
      </div>
      <!-- Work Amount  -->
      <div class="col-lg-4">
        <div class="work-amount card">
          <div class="card-close">
            <div class="dropdown">
              <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
              <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
            </div>
          </div>
          <div class="card-body">
            <h3>Temps travaillé</h3><small>Heures de travail actuelles cette semaine</small>
            <div class="chart text-center">
              <div class="text"><strong>{usi_work_hours}</strong><br><span>Heures</span></div>
              <canvas id="pieChart"></canvas>
            </div>
          </div>
        </div>
      </div>
      <!-- Total Overdue             -->
      <div class="col-lg-4">
        <div class="overdue card">
          <div class="card-close">
            <div class="dropdown">
              <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
              <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
            </div>
          </div>
          <div class="card-body">
            <h3>Salaire</h3><small>Salaire relatif aux heures de travail</small>
            <div class="number text-center">$20,000</div>
            <div class="chart">
              <canvas id="lineChart1"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</section>
