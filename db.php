<?php

	$con = mysqli_connect('localhost','root','incorrect','hackathon1_1');

	if(mysqli_connect_error($con))
	{
		echo "Failed to connect to MySQL".mysqli_connect_error();
	}

?>
