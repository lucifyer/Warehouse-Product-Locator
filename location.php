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
    <title>Search Location</title>
</head>
<body>

    <h1>Your product will be found at </h1>
    <?php

    echo $floor.'Floor <br>';
    echo $compartment.'compartment <br>';
    echo $shelf.'Shelf <br>';
    echo $basket.'Basket <br>';

    ?>

    <form action="pickproduct.php" method="post">
        <label for="barcode">Enter the barcode of item picked</label>
        <input type="text" name="barcode"><br>

        <input type="submit" value="Pick product">
    </form>



</body>
</html>
