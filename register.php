<?php
/* Registration process, inserts user info into the database
   and sends account confirmation email message
 */

include './sendmailbasic.php';

//Random salt generator
 function unique_salt() {
     return substr(sha1(mt_rand()),0,22);
 }

 session_start();

 require_once 'db.php';


// Escape all $_POST variables to protect against SQL injections

$empid = mysqli_real_escape_string($con,$_POST['empid']);
$name = mysqli_real_escape_string($con,$_POST['name']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$password = mysqli_real_escape_string($con,$_POST['password']);
$password= password_hash($password, PASSWORD_BCRYPT);
$hash=password_hash(unique_salt(), PASSWORD_BCRYPT);


//This is the directory where images will be saved
$target = "images/";
$target = $target . $email . '.jpg';


// Check if user with that email already exists
$result = mysqli_query($con,"SELECT * FROM employee WHERE email_id='$email'");

// We know email exists if the rows returned are more than 0
if ( mysqli_num_rows($result) > 0 ) {
  $message = "Employee with this email already exists!";
  echo "<script>alert('$message');</script>";
  header('Refresh:0;url=./registeremployee.php');
  die();
}

else {
  // username doesn't already exist in a database, proceed...

  if(!empty($_FILES['image']['tmp_name']))
  {
      //Writes the Filename to the server
      if(!move_uploaded_file($_FILES['image']['tmp_name'], $target))
      {
          //Checks if there was problem uploading it to server
          echo "There was problem uploading your image! Please try again with a different image after loggin in!<br>";
          $target='';
      }
  }
  else {
      $target='';
  }

    $sql = "INSERT INTO employee VALUES ('$empid','$name','$password','$email','$target','$hash')";

    // Add user to the database
    if ( mysqli_query($con,$sql) ){
        $message = "Employee added successfully!!";
        echo "<script>alert('$message');</script>";
        header('Refresh:0;url=./registeremployee.php');
    }

    else {
      $message = "Registration failed! Try again!";
      echo "<script>alert('$message');</script>";
      header('Refresh:0;url=./registeremployee.php');
    }

}
