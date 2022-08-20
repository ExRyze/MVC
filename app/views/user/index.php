<body>
  <div>
    <h1><?=$data["title"]?></h1>
    <a href="<?=BASE_URL;?>/home">Go to Home</a>
    <a href="<?=BASE_URL;?>/Blog">Go to Blog</a>
    <table>
      <?php 
      $i = 1;
      foreach($data['row'] as $row) :?>
      <tr>
        <td>
          <?=$i++;?>
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