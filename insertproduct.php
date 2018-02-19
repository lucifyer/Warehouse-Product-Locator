<?php

    require_once 'db.php';

    $productname=mysqli_real_escape_string($con,$_POST['productname']);
    $barid=mysqli_real_escape_string($con,$_POST['barid']);
    $category=mysqli_real_escape_string($con,$_POST['category']);
    $basket=mysqli_real_escape_string($con,$_POST['basket']);
    $shelf=mysqli_real_escape_string($con,$_POST['shelf']);
    $compartment=mysqli_real_escape_string($con,$_POST['compartment']);
    $floor=mysqli_real_escape_string($con,$_POST['floor']);

    $locationcode=$floor.'f'.$compartment.'c'.$shelf.'s'.$basket.'b';

    $query="INSERT INTO productinfo values('$productname',$barid,'$locationcode','$category')";


    if(mysqli_query($con,$query))
        echo 'data inserted!';
    else
    {
            // To check whether admission number or enrollment number has benn entered duplicate and give user defined error
        $x = mysqli_error($con);
        $pattern="/^Duplicate entry.*'PRIMARY'$/";
        //echo "Error in inserting data:".mysqli_error($con);
        if(preg_match($pattern,$x))
        {
            echo "<script>alert('Bar ID already registered!')</script>";
            echo '<script>window.history.back();</script>';
        }
    }

    mysqli_close($con);
?>
