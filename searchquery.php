<?php

    require_once 'db.php';

    $search= $_GET['value'];
    $resultstring='';
    $i=0;

    $query="SELECT distinct * FROM products where productname like '%$search%'";
    $result=mysqli_query($con,$query);

    while(($row=mysqli_fetch_array($result)) && $i<5)
    {
        // echo $row['productname'];
        $resultstring[$i]=$row['productname'];
        $i++;
    }

    $resultstring = json_encode($resultstring,true);
    echo $resultstring;

?>
