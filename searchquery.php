<?php

    require_once 'db.php';

    $search= $_GET['value'];
    $resultstring=array('');
    $i=0;


        $query="SELECT * FROM productinfo where productname like '%$search%' ";

        $result=mysqli_query($con,$query);

        while(($row=mysqli_fetch_array($result)) && $i<5)
        {
                if($i==0)
                {   $resultstring[$i]=$row['productname'];
                    $i++;
                }
                else {
                    $v=$i-1;
                    if($row['productname'] != $resultstring[$v])
                    {
                        $resultstring[$i]=$row['productname'];
                        $i++;
                    }
                }
        }

        $resultstring = json_encode($resultstring,true);
        echo $resultstring;


?>
