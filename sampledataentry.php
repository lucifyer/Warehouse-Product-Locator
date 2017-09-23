<?php

    require_once 'db.php';
    $i=1;
    for(;$i<10001; $i+=1)
    {

        $companynamerand=mt_rand(0,27);
        $companyname = array('Micromax','Apple','HP','asus','acer','MI','HCL','moto','mizu','dell','panasonic','lenovo','fasttrack','sandbox','deshpande','letez','lab','hyundai','audi','BMW','Maruti','Lotus','Suzuki','tata','qwe','asd','hello','bye');

        $productrand=mt_rand(0,24);
        $productname=array('phone','laptop','watch','shirt','pant','racket','table','bag','charger','cable','pen','pencil','tab','poi','oiu','uyt','ytr','rty','dfgdfg','sdcvb','svcvbgf','sfsdvd','sdfsdrg','sdfsdv','sdfsdf');

        $finalname=$companyname[$companynamerand].' '.$productname[$productrand].' '.$i;

        // echo $finalname.'<br>';


        $query="INSERT INTO products values('$finalname','this is sample product descitption fcommon for all products to increase the database size')";
        // echo $query.'<br>';
        mysqli_query($con,$query);

    }


    echo 'done!';
    mysqli_close($con);



?>
