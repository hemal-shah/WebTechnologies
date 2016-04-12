  <?php

  $connection = new mysqli("localhost", "root", "hemal", "Shopping");
  if($connection -> connect_error){
    die("Connection problem " . $connection -> connect_error);
  }
  $sql = "DELETE FROM shopping_cart WHERE 1";
  if(($connection -> query($sql)) === TRUE){
    header('Location: shopping.php');
  } else{
    echo "some error!" . $connection->error;
  }
  ?>
