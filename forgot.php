<?php
/* Reset your password form, sends reset.php password link */

include 'sendmailbasic.php';

require_once 'db.php';


// Check if form submitted with method="post"
if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $query= "SELECT * FROM employee WHERE email_id='$email'";
    $result = mysqli_query($con,$query);

    if (  mysqli_num_rows($result) == 0 ) // User doesn't exist
    {
        $message = "User with that email doesn't exist!";
        echo $message;
    }
    else { // User exists (num_rows != 0)

        $user = mysqli_fetch_assoc($result); // $user becomes array with user data

        $email = $user['email_id'];
        $hash=$user['hash'];

        // Send registration confirmation link (reset.php)

        $to      = $email;
        $subject = 'Password Reset Link ( Hackathon )';
        $message_body = '
        Hello '.$email.',

        You have requested password reset!

        Please click this link to reset your password:

        http://localhost/hackathon/reset.php?email='.$email.'&hash='.$hash;

        if(email_std($to, $subject, $message_body))
        {
            $message = "Password reset link has been sent to email address!";
            echo "<script>alert('$message');</script>";
            header('Refresh:0;url=./index.html');
        }

    }
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Reset Your Password</title>
</head>

<body>


    <h1>Reset Your Password</h1>

    <form action="forgot.php" method="post">
      <label>Email Address<span>*</span></label>
      <input type="email" required name="email"/>
    <input type="submit" value="Reset"/>
    </form>

</body>

</html>
