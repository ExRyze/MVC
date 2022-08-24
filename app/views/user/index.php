<body>
  <?php $this->view("template/navbar", $data); ?>
  <div class="col-md-8 m-auto container">
    <h1 class="mb-3"><?=$data["title"]?></h1>
    <div class="card">
      <div class="card-body">
        <table class="table">
          <thead>
            <td>No.</td>
            <td>NISN</td>
            <td>Name</td>
            <td>Password</td>
          </thead>
          <?php 
          $i = 1;
          foreach($data['row'] as $row) :?>
          <tr>
            <td>
              <?=$i++;?>
            </td>
            <td>
              <?=$row["nis"];?>
            </td>
            <td>
              <?=$row["name"];?>
            </td>
            <td>
              <?=$row["password"];?>
            </td>
          </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>
  </div>