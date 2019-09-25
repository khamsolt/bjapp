<?php
/** @var array $data */
/** @var array $links */
?>

<div class="card">
  <div class="card-header">
    <div class="d-flex align-items-center">
      <h3 class="mr-auto card-title">Задачи</h3>
      <div class="btn-group" role="group">
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
          Новая задача
        </button>
      </div>
    </div>
  </div>
  <div class="card-body p-0">
    <table class="table" id="task">
      <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Имя пользователя</th>
        <th scope="col">Email</th>
        <th scope="col">Статус</th>
        <th scope="col">Текст</th>
      </tr>
      </thead>
      <tbody>
      <?php foreach ($data as $element) { ?>
        <tr>
          <th scope="row"><?= $element->getId() ?></th>
          <td><?= $element->getUsername() ?></td>
          <td><?= $element->getEmail() ?></td>
          <td>
              <?php if ($element->getStatus() === 1) { ?>
                <span class="badge badge-secondary">В обработке</span>
              <?php } else { ?>
                <span class="badge badge-success">В обработке</span
              <?php } ?>
          </td>
          <td><?= $element->getText() ?></td>
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
              <?php for ($i = 1; $i <= $links['lastPage']; $i++) { ?>
                <a href="<?= $links[$i] ?>" class="btn <?php if ($links['currentPage'] === $i) { ?> btn-dark disabled <?php } else { ?> btn-outline-dark<?php } ?>">
                    <?= $i ?>
                </a>
              <?php } ?>
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
      <form id="taskForm" method="get" action="">
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
<script>
    <?= "var data=" . json_encode($data) . ";"; ?>
</script>

