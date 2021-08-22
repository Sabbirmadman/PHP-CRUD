<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <title></title>
  </head>
  <body class="container">
    <?php require_once 'process.php'; ?>
    <?php
      if(isset($_SESSION['message'])):?>

      <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php
          echo $_SESSION['message'];
          unset ($_SESSION['message']);

        ?>

      </div>
    <?php endif; ?>




    <?php
      $mysqli = new mysqli('localhost','root','','crud') or die(mysql_error($mysqli));
      $result = $mysqli->query('SELECT * FROM data')or
      die($mysqli->error);
      //pre_r($result->fetch_assoc());
      ?>
  <div class="row justify-content-center">>
    <table class='table'>
      <thead>
        <tr>
          <th>Name</th>
          <th>Location</th>
          <th colspan="2">Action</th>
        </th>
      </thead>
      <?php
        while ($row = $result->fetch_assoc()):?>

          <tr>
          <td><?php echo $row['name']?></td>
          <td><?php echo $row['location']?></td>
          <td>
              <a href="index.php?edit=<?php echo $row['id'];?>" class="btn btn-info">Edit</a>
              <a href="process.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>


          </td>
          </tr>
        <?php endwhile; ?>
    </table>
  </div>

  <?php
      function pre_r($array){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
      }


    ?>




    <form class="" action="process.php" method="post">
      <input type="hidden" name="id" value="<?php echo $id;?>">
      <input class="form-control" type="text" name="name" value="<?php echo $name;?>" placeholder="">
      <input class="form-control" type="text" name="location" value="<?php echo $location;?>" placeholder="">

      <?php
        if($update==true):
       ?>
       <button class="btn btn-primary" type="submit" name="update">Update</button>
       <?php
     else:
        ?>
      <button class="btn btn-primary" type="submit" name="save">save</button>

      <?php
    endif;
       ?>

    </form>

  </body>
</html>

<!-- link -> https://www.youtube.com/watch?v=3xRMUDC74Cw&ab_channel=CleverTechie -->
