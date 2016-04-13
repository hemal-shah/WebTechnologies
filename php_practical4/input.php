<?php
  session_start();
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
      <?php

        if(isset($_GET['card_id'])){
          setcookie('_id', $_GET['card_id']);
            $GLOBALS['isEdit'] = TRUE;
            $_SESSION['editMode'] = TRUE;
            echo "Edit your Card!";
          } else {
            $GLOBALS['isEdit'] = FALSE;
            echo "Add new Card!";
          }
      ?>

    </title>

      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <style media="screen">
      .container{
        margin-top: 30px;
      }
    </style>
  </head>


  <body>



      <?php

        if($_SERVER["REQUEST_METHOD"] == "POST"){

          $name = $_POST["full_name"];
          $company = $_POST["company"];
          $post = $_POST["post"];
          $email = $_POST["email"];
          $contact = $_POST["contact"];
          $website = $_POST["website"];

          $connection = new mysqli("localhost", "root", "hemal", "vcms");
          if($connection -> connect_error){
            die("Connection error!" . $connection -> connect_error);
          }

          if(!isset($_SESSION['editMode'])){
            $sql = "INSERT INTO cards (name, post, company, website, email, contact) VALUES (?,?,?,?,?,?)";
            $statement = $connection -> prepare($sql);
            $statement -> bind_param("ssssss", $name, $post, $company, $website, $email, $contact);
            $statement -> execute();
            header("Location: vcms.php");
            session_unset();
            session_destroy();
          } else {

            $sql = "UPDATE cards SET name=?, post=?, company=?, website=?, email=?, contact=? WHERE _id=" . $_COOKIE['_id'];
            $statement = $connection -> prepare($sql);
            $statement -> bind_param("ssssss", $name, $post, $company, $website, $email, $contact);
            $statement -> execute();
            session_unset();
            session_destroy();
            header("Location: vcms.php");
          }

        }
       ?>

           <?php
             if(isset($_SESSION['editMode'])){
               $sql = "SELECT * FROM cards WHERE _id = " . $_GET['card_id'];
               $connection = new mysqli("localhost", "root", "hemal", "vcms");
               if($connection -> connect_error){
                 die("Connection error!" . $connection -> connect_error);
               }
               $result = $connection -> query($sql);
               if($result -> num_rows > 0){
                 while ($row = $result -> fetch_assoc()) {
                   $GLOBALS['_id'] = $row['_id'];
                   $GLOBALS['name'] = $row['name'];
                   $GLOBALS['email'] = $row['email'];
                   $GLOBALS['contact'] = $row['contact'];
                   $GLOBALS['website'] = $row['website'];
                   $GLOBALS['company'] = $row['company'];
                   $GLOBALS['post'] = $row['post'];
                 }
               }
             }
            ?>

    <div class="container">
            <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
              <div class="form-group">
                <label for="name">Name :</label>
                <input class="form-control" type="text" name="full_name" value="<?php if($GLOBALS['isEdit'] === TRUE) echo $GLOBALS['name'];?>" placeholder="Enter Full Name" required>
              </div>
              <div class="form-group">
                <label for="company">Company :</label>
                <input class="form-control" type="text" name="company" value="<?php if($GLOBALS['isEdit'] === TRUE) echo $GLOBALS['company'];?>" placeholder="Where do you work?" required>
              </div>
              <div class="form-group">
                <label for="post">Post</label>
                <input class="form-control" type="text" name="post" value="<?php if($GLOBALS['isEdit'] === TRUE) echo $GLOBALS['post'];?>" placeholder="What do you do there?" required>
              </div>
              <div class="form-group">
                <label for="email">Email :</label>
                <input class="form-control" type="email" placeholder="Your Email" name="email" value="<?php if($GLOBALS['isEdit'] === TRUE) echo $GLOBALS['email'];?>" required>
              </div>
              <div class="form-group">
                <label for="contact">Contact Number :</label>
                <input class="form-control" type="text" placeholder="+91-xxxxxxxxxx" name="contact" value="<?php if($GLOBALS['isEdit'] === TRUE) echo $GLOBALS['contact'];?>" required>
              </div>
              <div class="form-group">
                <label for="website">Website</label>
                <input class="form-control" type="text" placeholder="www.xyz.abc" name="website" value="<?php if($GLOBALS['isEdit'] === TRUE) echo $GLOBALS['website'];?>" required>
              </div>
              <input class="form-control btn btn-info" type="submit" value="Submit">
            </form>
      </div>
  </body>
</html>
