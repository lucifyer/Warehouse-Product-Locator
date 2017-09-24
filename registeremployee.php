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
    <title>Add new Employee</title>

    <script>

    //To check wether both the passwords are same
        function validate()
        {
            if(document.getElementById('password').value==document.getElementById('password2').value)
              return true;
            else {
                alert('Passwords do not match!');
                return false;
            }
        }
    </script>
</head>
<body>

    <form action="register.php" onsubmit="return validate()" method="post" enctype="multipart/form-data">

        <label for="empid">Employee ID:</label>
        <input type="text" name="empid" ><br>

      <label for="name">Name</label>
      <input type="text" required name='name' /><br>


      <label for="email">Email Address</label>
      <input type="email" required name='email' /><br>

      <label for="password">Password</label>
      <input type="password" required name='password' id="password" /><br>

      <label for="password2">Re-enter Password</label>
      <input type="password" required name='password2' id="password2" /><br>

      <label for="image">Display Picture</label>
      <input type="file" name="image"><br>

      <button type="submit" name="register" />Register</button>

    </form>

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
