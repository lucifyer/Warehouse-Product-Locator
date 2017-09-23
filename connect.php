<?php

    require_once 'db.php';
    $i=1;
    for(;$i<10001; $i+=1)
    {
        // $id=mt_rand(0,100);
        //
        // $array=mt_rand(0,13);
        //
        // $name = array('Micromax','Apple','HP','asus','acer','MI','HCL','moto','mizu','dell','pnasonic','lenovo','fasttrack','sandbox');
        //
        // $query="INSERT into withindex values($id,'$name[$array]','Electronics')";
        //
        // if(mysqli_query($con,$query));
        //     //echo 'done';
        // else {
        //         mysqli_error($con);
        // }
        //
        // // echo $query;
        //
        // $query="INSERT into withoutindex values($id,'$name[$array]','Electronics')";
        //
        // if(mysqli_query($con,$query));
        //     //echo 'done';
        // else {
        //         mysqli_error($con);
        // }
        //
        // // echo $query;

        //
        // $name='product'.$i;
        // // echo $name.'<br>';
        //
        // $query="INSERT into withindexunique values('$name','$name','$name','$name','$name')";
        // if(mysqli_query($con,$query));
        //     //echo 'done';
        // else {
        //         mysqli_error($con);
        // }
        //
        //
        // $query="INSERT into withoutindexunique values('$name','$name','$name','$name','$name')";
        // if(mysqli_query($con,$query));
        //     //echo 'done';
        // else {
        //         mysqli_error($con);
        // }
        // echo $i;
        // echo '<br>';



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
