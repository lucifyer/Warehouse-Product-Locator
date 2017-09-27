<?php
    session_start();
    $barcode=$_POST['barcode'];

    require_once  'db.php';

    $query="INSERT INTO picked_items values($_SESSION[empid],$barcode,'$_SESSION[pname]')";

    mysqli_query($con,$query);
    echo mysqli_error($con);

    $query = "DELETE from productinfo where barid=$barcode";



    mysqli_query($con,$query);


        $message = "Item Picked";
        echo "<script>alert('$message');</script>";
        header('Refresh:0;url=./profile.php');

    mysqli_close($con);

?>
