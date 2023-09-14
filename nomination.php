<?php
require('config.php');

                      //Establish Connection
                        $conn= mysqli_connect($hostname, $username, $password, $database);

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $partydesc = $_POST['party'];
  $about = $_POST['about'];

  $img = $_FILES['img']['name'];

  $sql = mysqli_query($conn,"INSERT INTO nominee(name,party,about,img) VALUES('$name','$partydesc','$about','$img')");

     $dir = "uploads/".$img;

     if ($sql == TRUE) {
         move_uploaded_file($_FILES['img']['tmp_name'], $dir);
         echo "<script>
        alert('Nominee Added Successfully')
       </script>";
     }
     else
     {
        echo "<script>
        alert('Error')
       </script>";    
     }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Nomination Panel</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>

    <style>
      .headerFont{
        font-family: 'Ubuntu', sans-serif;
        font-size: 24px;
      }

      .subFont{
        font-family: 'Raleway', sans-serif;
        font-size: 14px;
        
      }
      
      .specialHead{
        font-family: 'Oswald', sans-serif;
      }

      .normalFont{
        font-family: 'Roboto Condensed', sans-serif;
      }
    </style>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	
	<div class="container">
  	<nav class="navbar navbar-default navbar-fixed-top navbar-inverse
    " role="navigation">
      <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="navbar-header">
          <a href="cpanel.php" class="navbar-brand headerFont text-lg"><strong>eVoting</strong></a>
        </div>

        <div class="collapse navbar-collapse" id="example-nav-collapse">
          <ul class="nav navbar-nav">
            
             <li><a href="nomination.php"><span class="subFont"><strong>Add Nomination's List</strong></span></a></li>
             <li><a href="viewnomination.php"><span class="subFont"><strong>View Nomination's List</strong></span></a></li>
             <li><a href="addcitzn.php"><span class="subFont"><strong>Add Citizen</strong></span></a></li>
             <li><a href="viewcitzn.php"><span class="subFont"><strong>View Citizen</strong></span></a></li>
            <li><a href="changePassword.php"><span class="subFont"><strong>Admin's Password</strong></span></a></li>
          
          </ul>
          

          <span class="normalFont"><a href="index.html" class="btn btn-success navbar-right navbar-btn"><strong>Sign Out</strong></a></span>
        </div>

      </div> <!-- end of container -->
    </nav>

    <div class="container" style="padding-top:150px;">
      <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10" style="border:2px solid gray;padding:20px;">
          
          <div class="page-header">
            <h2 class="specialHead">Add Nomination</h2>
          </div>
          <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="">Name</label><br>
              <input type="text" name="name" placeholder="Enter Nominee Name" class="form-control"><br>

              <label for="">Party Belongs To</label><br>
              <textarea class="form-control" name="party" style="height: 200px;"></textarea><br>
              <label for="">About Nominee</label><br>
              <textarea class="form-control" name="about" style="height: 200px;"></textarea>
              <br>
               <label for="">Nominee Image</label><br>
              <input type="file" name="img" class="form-control">
              <br>

              <button type="submit" class="btn btn-block span btn-primary " name="submit"><span class="glyphicon glyphicon-user"></span> Submit</button>

              <label id="error"></label>
            </div>

          </form>
          <br>

        </div>
        <div class="col-sm-1"></div>
      </div>
    </div>
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>