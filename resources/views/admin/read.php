<?php

/** @var App\Models\Task $task */

?>
<div class="row">
  <div class="col-lg-6">
    <form id="updateForm" class="form-signin" method="POST" action="/admin/update">
      <div class="card">
        <div class="card-body">
          <div class="form-row">
            <input type="hidden" name="id" value="<?= $task->getId() ?>">
            <div class="col-md-6 mb-3">
              <label for="name">Имя</label>
              <input name="name" type="text" class="form-control" id="name" placeholder="Имя" value="<?= $task->name ?>">
            </div>
            <div class="col-md-6 mb-3">
              <label for="surname">Фамилия</label>
              <input name="surname" type="text" class="form-control" id="surname" placeholder="Фамилия" value="<?= $task->surname ?>">
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-12 mb-3">
              <label for="email">Email</label>
              <input name="email" type="text" class="form-control" id="email" placeholder="Email" value="<?= $task->getEmail() ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="task">Задача</label>
            <textarea name="task" class="form-control" id="task" rows="3"><?= $task->getText() ?></textarea>
          </div>
          <div class="form-group">
            <div class="custom-control custom-switch">
              <input name="status" type="checkbox" class="custom-control-input" id="customSwitch1" <?php if ($task->getStatus() > 1): ?> checked <?php endif; ?>>
              <label class="custom-control-label" for="customSwitch1">Статус обработки задачи</label>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <button class="btn btn-lg btn-primary btn-block" type="submit">Сохранить</button>
        </div>
      </div>
    </form>
  </div>
</div>
