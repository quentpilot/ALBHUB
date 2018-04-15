<body>

<?php if ($this->user_log->is_loged()) : ?>

<div class="page">

  {nav_menu_content}

  <div class="page-content d-flex align-items-stretch">

  {side_menu_content}

    <div class="content-inner">

      {page_bar_content}

      {alert_message_content}

      {body_content}

      {foot_content}

    </div>
  </div>
</div>

<?php endif ?>

<?php ?>

<?php if (!$this->user_log->is_loged()) : ?>

  {body_content}

<?php endif ?>
<!--{js_files}-->

<script src="{assets_url}/vendor/jquery/jquery.min.js"></script>
<script src="{assets_url}/vendor/popper.js/umd/popper.min.js"> </script>
<script src="{assets_url}/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="{assets_url}/vendor/jquery.cookie/jquery.cookie.js"> </script>
<script src="{assets_url}/vendor/chart.js/Chart.min.js"></script>
<script src="{assets_url}/vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="{assets_url}/js/charts-home.js"></script>
<!-- Main File-->
<script src="{assets_url}/js/front.js"></script>

</body>
