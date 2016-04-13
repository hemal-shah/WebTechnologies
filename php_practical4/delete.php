<?php
  if(isset($_GET['card_id'])){

      $connection = new mysqli("localhost", "root", "hemal", "vcms");
      if($connection -> connect_error){
        die("Connection error!" . $connection -> connect_error);
      }
      $sql = 'DELETE FROM cards WHERE _id=' . $_GET['card_id'];
      $connection -> query($sql);
      header("Location: vcms.php");
  } else {
    echo "You need to pass an id!";
  }
 ?>
