<?php
    session_start();

    require_once 'db.php';

    $search= $_GET['name'];
    $resultstring=array('');
    $i=0;

    $query="SELECT * FROM productinfo where productname = '$search' ";

    $result=mysqli_query($con,$query);

    $row=mysqli_fetch_array($result);

    $location = $row['locationcode'];

    $_SESSION['pname'] = $row['productname'];

    $pattern = '/\d+/';
    preg_match_all($pattern,$location,$matches);

    $floor = $matches[0][0];
    $compartment = $matches[0][1];
    $shelf = $matches[0][2];
    $basket = $matches[0][3];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <script src="bootstrap/js/bootstrap.js"></script>

    <title>Search Location</title>
</head>
<body>

    <div class="container">



    <h1>Your product will be found at </h1>
    <?php

    echo $floor.'Floor <br>';
    echo $compartment.'compartment <br>';
    echo $shelf.'Shelf <br>';
    echo $basket.'Basket <br>';

    ?>

    <form action="pickproduct.php" method="post">
        <div class="row">

        <label for="barcode">Enter the barcode of item picked</label><br>
        <input type="text" class="col-lg-5" name="barcode"><br><br>

        <input class="btn btn-danger" type="submit" value="Pick product">


                </div>
    </form>

    </div>



</body>
</html>
