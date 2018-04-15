<!-- Page Header-->
<header class="page-header">
  <div class="container-fluid">
    <h2 class="no-margin-bottom">{title}</h2>
  </div>
</header>
<!-- Breadcrumb-->
<div class="breadcrumb-holder container-fluid">
  <ul class="breadcrumb">

    <?php foreach ($breadcrumb as $part) : ?>
      <?php $link = '<a href="'.$site_url.'/admin/'.$part.'">'.$part.'</a>' ?>
      <?php $is_active = '' ?>
      <?php if ($part == $breadcrumb[count($breadcrumb) - 1]) : ?>
        <?php $link = $part ?>
        <?php $is_active = 'active' ?>
      <?php endif ?>
      <li class="breadcrumb-item <?= $is_active ?>"><?= $link ?></li>
    <?php endforeach ?>
  </ul>
</div>
