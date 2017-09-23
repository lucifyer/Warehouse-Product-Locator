<?php

    require_once 'db.php';

    $productname=mysqli_real_escape_string($con,$_POST['productname']);
    $barid=mysqli_real_escape_string($con,$_POST['barid']);
    $category=mysqli_real_escape_string($con,$_POST['category']);
    $basket=mysqli_real_escape_string($con,$_POST['basket']);
    $shelf=mysqli_real_escape_string($con,$_POST['shelf']);
    $compartment=mysqli_real_escape_string($con,$_POST['compartment']);
    $floor=mysqli_real_escape_string($con,$_POST['floor']);

    $query1="INSERT INTO product values($barid,'$productname','$basket','$category')";

    if(mysqli_query($con,$query1))
    {

        $query3="SELECT * FROM basket where basket_no='$basket' and shelf_no='$shelf'";
        $result= mysqli_query($con,$query3);

        // echo $query3;

        if(mysqli_num_rows($result)==0)
        {
            $query4="INSERT INTO basket values('$basket','$shelf')";

            if(!mysqli_query($con,$query4))
                mysqli_error($con);

            // echo $query4;

                    echo ' basket inserted!';
        }



        $query3="SELECT * FROM shelf where shelf_no='$shelf' and cmpt_no='$compartment'";
        $result= mysqli_query($con,$query3);

        // echo $query3;

        if(mysqli_num_rows($result)==0)
        {
            $query4="INSERT INTO shelf values('$shelf','$compartment')";

            if(!mysqli_query($con,$query4))
                mysqli_error($con);

            // echo $query4;

                    echo ' shelf inserted!';
        }

        $query5="SELECT * FROM compartment where cmpt_no='$compartment' and flr_no='$floor'";
        $result= mysqli_query($con,$query5);

        // echo $query5;
        if(mysqli_num_rows($result)==0)
        {
            $query6="INSERT INTO compartment values('$compartment','$floor')";

            mysqli_query($con,$query6);
            //
            // echo $query6;

                    echo ' compartment inserted!';
        }

            $query5="SELECT * FROM floortable where flr_no='$floor'";
            $result= mysqli_query($con,$query5);



            if(mysqli_num_rows($result)==0)
            {
                $query6="INSERT INTO floortable values('$floor')";

                mysqli_query($con,$query6);

                // echo $query6;

                        echo ' floor inserted!';
            }

        }


    else
        echo mysqli_error($con);

    mysqli_close($con);
?>
