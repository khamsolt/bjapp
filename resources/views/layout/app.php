<?php
/** @var string $content */

use App\Components\Session;

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BeeJee Test Application</title>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/w/bs4/dt-1.10.18/datatables.min.css"/>
  <script src="/js/app.js" defer></script>
  <style rel="stylesheet">
    table.table.dataTable {
      margin-top: 0;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="/">BeeJee Test App</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <?php if (Session::isAuthorized()) { ?>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?= Session::user() ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/admin">Админ панель</a>
                <a class="dropdown-item" href="/admin/logout">Выйти</a>
              </div>
            </li>
          </ul>
        <?php } else { ?>
          <a href="/admin/login" class="btn btn-outline-success btn-md-block">Войти</a>
        <?php } ?>
    </div>
  </div>
</nav>
<div class="container p-4">
  <div class="row justify-content-center">
    <div class="col-lg-12">
        <?php if (!empty($alerts = Session::getFlash())): ?>
            <?php foreach ($alerts as $alert): ?>
            <div class="alert alert-<?= $alert[0] ?> alert-dismissible fade show" role="alert">
                <?= $alert[1] ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-lg-12">
        <?= $content ?>
    </div>
  </div>
</div>
</body>
</html>
