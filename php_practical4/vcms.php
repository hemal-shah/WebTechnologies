<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Visiting Card Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <style media="screen">
      .mystyle{
        position: fixed;
        clear: both;
        bottom: 30px;
        right: 30px;
      }
    </style>
  </head>
  <body>
    <div class="container">

      <?php
        $connection = new mysqli("localhost", "root", "hemal", "vcms");
        if($connection -> connect_error){
          die("Connection error!" . $connection -> connect_error);
        }
        $sql = "SELECT * FROM cards";
        $result = $connection -> query($sql);
        if($result -> num_rows > 0){
          //We have data in database!
          while($row = $result -> fetch_assoc()){
            echo '<div class="row"><div class="col-sm-6 col-sm-offset-3"><div class="card green"><div class="card-content white-text">';
            echo '<span class="card-title">' . $row["name"] . "</span>";
            echo '<p>' . $row["post"] . "</p>";
            echo '<p>' . $row["company"] . "</p></div>";
            echo '<div class="card-action white">';
            echo '<a href="' . $row['website'] .'">Website</a>';
            echo '<a href="mailto:' . $row['email'] .'?Subject="Hello%20there!">Email</a>';
            echo '<a href="' . $row['contact'] .'">Contact</a>';
            echo '<a href="input.php?card_id=' .$row['_id']. '">Edit</a>';
            echo '<a href="delete.php?card_id=' .$row['_id'] . '">Delete</a>';

            echo '</div></div></div></div>';
          }
        } else {
          echo '<div class="text-center"><h2>You can add new card by clicking <a href="input.php">here!</a></h2></div>';
        }
       ?>
    </div>
<a class="btn-floating btn-large waves-effect waves-light red mystyle" href="input.php"><i class="material-icons">add</i></a>
  </body>
</html>
