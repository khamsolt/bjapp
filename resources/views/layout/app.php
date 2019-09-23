<?php
/** @var string $content */
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BeeJee Test Application</title>
  <script src="/js/app.js" defer></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">BeeJee Test App</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <a href="" class="btn btn-outline-success btn-md-block">Войти</a>
    </div>
  </div>
</nav>
<div class="container p-4">
  <div class="row justify-content-center">
    <div class="col-lg-12">
        <?= $content ?>
    </div>
  </div>
</div>
</body>
</html>
