<?php
  session_start();
  if(isset($_SESSION['email']) && isset($_SESSION['logged_in']))
  {
    if($_SESSION['email']!='admin@admin.com')
    {
      $message = "You are not authorized to add a staff!";
      echo "<script>alert('$message');</script>";
      header('Refresh:0;url=profile.php');
    }
?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <script src="bootstrap/js/bootstrap.js"></script>

        <title>Add new Employee</title>

        <script>
            //To check wether both the passwords are same
            function validate() {
                if (document.getElementById('password').value == document.getElementById('password2').value)
                    return true;
                else {
                    alert('Passwords do not match!');
                    return false;
                }
            }
        </script>
    </head>

    <body>

        <h1>Register a new employee!</h1>

        <div class="container">


        <form action="register.php" onsubmit="return validate()" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-3">

                </div>
                
            <div class="col-lg-7">
                <label for="empid">Employee ID:</label>
                <input class="form-control" type="text" name="empid"><br>
            </div>
            <div class="col-lg-3">

            </div>
            <div class="col-lg-7">
                <label for="name">Name</label>
                <input class="form-control" type="text" required name='name' /><br></div>
            <div class="col-lg-3">

            </div>

            <div class="col-lg-7">
                <label for="email">Email Address</label>
                <input class="form-control" type="email" required name='email' /><br></div>
            <div class="col-lg-3">

            </div>
            <div class="col-lg-7">
                <label for="password">Password</label>
                <input class="form-control" type="password" required name='password' id="password" /><br></div>
            <div class="col-lg-3">

            </div>
            <div class="col-lg-7">
                <label for="password2">Re-enter Password</label>
                <input class="form-control" type="password" required name='password2' id="password2" /><br></div>
            <div class="col-lg-3">

            </div>
            <div class="col-lg-7">
                <label for="image">Display Picture</label>
                <input class="form-control" type="file" name="image"><br>
                <div class="col-lg-7">
                    <button class="btn btn-danger" type="submit" name="register" />Register</button>

        </form>


    </div>

    </body>

    </html>




    <?php
    }
    else {
        $message = "Please login to view this page!";
        echo "<script>alert('$message');</script>";
        header('Refresh:0;url=./index.php');
    }

?>
