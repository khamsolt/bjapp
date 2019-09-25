<?php
/** @var array $links */

use Pecee\SimpleRouter\SimpleRouter;

/** @var string $content */
/** @var array $data */
?>

<div class="card border-dark">
  <div class="card-header bg-dark">
    <div class="d-flex align-items-center">
      <h3 class="mr-auto card-title text-light">Задачи</h3>
    </div>
  </div>
  <div class="card-body p-0">
    <table class="table" id="task">
      <thead>
      <tr>
        <th scope="col">#</th>
        <th>Имя пользователя</th>
        <th>Email</th>
        <th>Статус</th>
        <th>Текст</th>
        <th>Действия</th>
      </tr>
      </thead>
      <tbody>
      <?php foreach ($data as $element) { ?>
        <tr>
          <th scope="row"><?= $element->getId() ?></th>
          <td><?= $element->getUsername() ?></td>
          <td><?= $element->getEmail() ?></td>
          <td>
              <?php if ($element->getStatus() === 1): ?>
                <span class="badge badge-secondary">В обработке</span>
              <?php else: ?>
                <span class="badge badge-success">Отредактировано администратором</span
              <?php endif; ?>
          </td>
          <td><?= $element->getText() ?></td>
          <td><a class="btn btn-sm btn-outline-primary" href="<?= SimpleRouter::router()->getUrl('read', ['id' => $element->getId()]) ?>">Обновить</a></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>
  <div class="card-footer">
    <div class="row">
      <div class="col-lg-4">
        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
          <div class="btn-group mr-2" role="group" aria-label="First group">
              <?php for ($i = 1; $i <= $links['lastPage']; $i++): ?>
                <a href="<?= $links[$i] ?>" class="btn <?php if ($links['currentPage'] === $i): ?> btn-dark disabled <?php else: ?> btn-outline-dark<?php endif; ?>">
                    <?= $i ?>
                </a>
              <?php endfor; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="taskForm" method="POST" action="/add">
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Фамилия</label>
            <input name="name" type="text" class="form-control" id="name">
          </div>
          <div class="form-group">
            <label for="surname">Имя</label>
            <input name="surname" type="text" class="form-control" id="surname">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input name="email" type="email" class="form-control" id="email">
          </div>
          <div class="form-group">
            <label for="task">Текст задачи</label>
            <textarea name="task" class="form-control" id="task" rows="3"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Заркыть</button>
          <button type="submit" class="btn btn-primary">Дабавить новую задачу</button>
        </div>
      </form>
    </div>
  </div>
</div>
