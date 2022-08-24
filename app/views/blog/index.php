<body>
  <?php $this->view("template/navbar", $data); ?>
  <div class="col-md-8 m-auto container">
    <h1 class="mb-3"><?=$data["title"]?></h1>
    <a href="<?= BASE_URL; ?>/blog/add" class="btn btn-primary mb-3">Add <?=$data["title"]?></a>
    <div class="card">
      <div class="card-body">
        <table class="table">
          <thead>
            <td>No.</td>
            <td>Title</td>
            <td>Description</td>
            <td>Action</td>
          </thead>
          <?php 
          $i = 1;
          foreach($data['row'] as $row) :?>
          <tr>
            <td>
              <?=$i++;?>
            </td>
            <td>
              <?=$row["title"];?>
            </td>
            <td>
              <?=$row["description"];?>
            </td>
            <td>
              <a href="<?= BASE_URL; ?>/blog/edit/<?= $row["id_blog"]; ?>" class="btn btn-warning mb-3">Edit</a>
              <a href="<?= BASE_URL; ?>/blog/delete/<?= $row["id_blog"]; ?>" class="btn btn-danger mb-3">Delete</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>
  </div>