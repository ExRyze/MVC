<body>
  <?php $this->view("template/navbar", $data); ?>
  <div class="col-md-8 m-auto container">
    <h1 class="mb-3"><?=$data["title"]?></h1>
    <div class="card">
      <div class="card-body">
        <form action="<?= BASE_URL; ?>/blog/addConfig" method="post" class="d-flex flex-wrap">
          <label class="w-25" for="title">Title</label>
          <input class="w-75" type="text" name="title" id="title">
          <label class="w-25" for="description">Description</label>
          <input class="w-75" type="text" name="description" id="description">
          <button type="submit" class="btn btn-primary text-right">Add</button>
        </form>
      </div>
    </div>
  </div>