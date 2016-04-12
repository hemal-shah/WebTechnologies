<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>My Cart!</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  </head>
  <body>
    <div class="container">
      <table class="table table-striped table-bordered table-responsive">
        <thead>
          <tr>
            <td>
              Sr. No.
            </td>
            <td>
              Item Name
            </td>
            <td>
              Item Price
            </td>
          </tr>
        </thead>
        <tbody>
          <?php

            $connection = new mysqli("localhost", "root", "hemal", "Shopping");
            if($connection -> connect_error){
              die("Connection problem " . $connection -> connect_error);
            }
            $total_price = 0;
            $sql = "SELECT * FROM shopping_cart";
            $result = $connection -> query($sql);

            if($result -> num_rows > 0){
              while($row = $result -> fetch_assoc()){
                echo '<tr><td>' . $row["ID"] . '</td><td>'. $row["item_name"] . '</td><td>' . $row["item_price"] . '</td></tr>';
                $total_price += $row["item_price"];
              }
              echo '<tr><td></td><td>Total Price : <b></b></td><td>' . $total_price . '</td></tr>';
            } else {
              echo "<tr><td>-</td><td>-</td><td>-</td></tr>";
            }
           ?>
        </tbody>
      </table>
    </div>
  </body>
</html>
