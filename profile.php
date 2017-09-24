<?php
    session_start();

    if(isset($_SESSION['logged_in']))
    {
        $admin = false;
        if($_SESSION['image']=='')
            $dp='images/default.png';
        else
            $dp=$_SESSION['image'];
        if($_SESSION['email']=='admin@admin.com')
            $admin =true;

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
  </head>
  <body>
      <h1>Hey <?php echo $_SESSION['email']?></h1>
      <img src="<?php echo $dp ?>" width="70px" height="80px" alt="error"><br>

    <a href="./change.php">Change your password</a>
    <a href="./search.php">Search product</a>

    <?php if($admin)
        {
            echo ('<a href="./registeremployee.php">Add an employee</a>');
            echo ('<a href="./addproduct.php">Add a product</a>');
        }
        else {
            echo ('<a href="./listitems.php">Cart</a>');
        }
    ?>

    <a href="./logout.php">Logout</a>

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
