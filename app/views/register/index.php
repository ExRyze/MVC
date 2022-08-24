<body>
  <?php $this->view("template/navbar", $data); ?>
  <div class="col-md-8 m-auto container">
    <h1 class="mb-3"><?=$data["title"]?></h1>
    <div class="card">
      <div class="card-body">
        <form action="<?= BASE_URL; ?>/register/config" method="post" class="d-flex flex-wrap mb-3">
          <label class="w-25" for="nis">NIS</label>
          <input class="w-75" type="text" name="nis" id="nis">
          <label class="w-25" for="name">Name</label>
          <input class="w-75" type="text" name="name" id="name">
          <label class="w-25" for="password">Password</label>
          <input class="w-75" type="text" name="password" id="password">
          <button type="submit" class="btn btn-primary text-right">Register</button>
        </form>
        <a href="<?= BASE_URL; ?>/login">Login?</a>
      </div>
    </div>
  </div>