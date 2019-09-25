<?php
/** @var array $links */
/** @var string $content */
/** @var array $data */
?>
<div class="row justify-content-end">
  <div class="col-lg-4">
    <form id="loginForm" class="form-signin" method="post" action="/admin/auth">
      <div class="card">
        <div class="card-body">
          <div class="form-label-group">
            <label for="inputEmail">Логин</label>
            <input name="login" type="text" id="inputEmail" class="form-control" placeholder="Логин" required autofocus>
          </div>
          <div class="form-label-group mb-4">
            <label for="inputPassword">Пароль</label>
            <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Пароль" required>
          </div>
        </div>
        <div class="card-footer">
          <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
        </div>
      </div>
    </form>
  </div>
</div>
