<?php
/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections
session_start();

require_once 'db.php';

$email = mysqli_real_escape_string($con,$_POST['email']);
$result = mysqli_query($con,"SELECT * FROM employee WHERE email_id='$email'");

if ( mysqli_num_rows($result) == 0 ){ // User doesn't exist
  $message = "No such username registered!";
  echo "<script>alert('$message');</script>";
  header('Refresh:0;url=index.html');
}
else { // User exists
    $user = mysqli_fetch_assoc($result);

    if (password_verify($_POST['password'],$user['password']))
     {
        $_SESSION['email'] = $user['email_id'];
        $_SESSION['image'] = $user['photo'];
        $_SESSION['empid'] = $user['emp_id'];
        // This is how we'll know the user is logged in

        $_SESSION['logged_in'] = true;

        header("location: profile.php");
    }
    else {
      $message = "Wrong password";
      echo "<script>alert('$message');</script>";
      header('Refresh:0;url=index.html');
    }
}
