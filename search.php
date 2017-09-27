<?php

session_start();

if(isset($_SESSION['logged_in']))
{

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <script src="bootstrap/js/bootstrap.js"></script>

    <style media="screen">
        a{
            text-decoration: none;
        }
    </style>

    <title>Search</title>
</head>
<body>

    <h1>Search for the location of product</h1>
    <form  method="GET">
        <div class="col-lg-2">

        </div>
        <div class="col-lg-8">


        <label for="string">Enter the product name</label>
        <input type="text" class="form-control" name="string" id="string" onkeyup="loadsuggestion()">
        <div id="result">

        </div>
            </div>

    </form>

    <script>


        function loadsuggestion()
        {
            if(document.getElementById('string').value!='')
            {
                var address='searchquery.php?value='+document.getElementById('string').value;
                var xhr= new XMLHttpRequest();
                xhr.open('GET',address,true);

                xhr.onload=function()
                {
                    if(this.status==200)
                    {
                        var resultvar=JSON.parse(this.responseText);
                        var resultstring='';
                        var i=0;
                        while(resultvar[i])
                        {
                            resultstring+="<a href='location.php?name="+resultvar[i]+"'>"+resultvar[i]+'</a><br>';
                            i+=1;
                        }
                        document.getElementById('result').innerHTML=resultstring;
                    }
                }
                xhr.send();
            }
            else {
                document.getElementById('result').innerHTML='';
            }
        }


    </script>
</body>
</html>

<?php
    }
    else {
        $message = "Please login to view this page!";
        echo "<script>alert('$message');</script>";
        header('Refresh:0;url=./index.php');
    }

?>
