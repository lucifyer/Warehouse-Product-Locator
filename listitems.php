<?php

    session_start();
    require_once 'db.php';

    $query = "SELECT * from picked_items where emp_id = $_SESSION[empid]";

    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result)==0)
    {
        echo 'cart is empty!';
    }
    else {
        echo '<table border=1>';
        while($row = mysqli_fetch_array($result))
        {
            echo '<tr>';
            echo '<td>'.$row['barc_id'].'</td>';
            echo '<td>'.$row['pname'].'</td>';
            echo '</tr>';
        }
        echo '</table>';
    }

    mysqli_close($con);

?>
