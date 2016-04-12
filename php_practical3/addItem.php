<?php
  $connection = new mysqli("localhost", "root", "hemal", "Shopping");
  if($connection -> connect_error){
    die("Connection Error ! " . $connection -> connect_error);
  }

  if(isset($_POST["item_name"]) && isset($_POST["item_price"])){
    $name = $_POST["item_name"];
    $price = $_POST["item_price"];
    $sql_string = 'INSERT INTO shopping_cart (item_name, item_price, item_count) VALUES ("' . $name. '",' . $price. ', 1)';
    if($connection -> query($sql_string) === TRUE){
      header("Location: shopping.php");
    } else {
      echo "error!" .$sql_string . " ". $connection -> error;
    }
  } else {
    echo "Something missing!";
  }
 ?>
