<?php
  session_start();
  if(isset($_SESSION['email']) && isset($_SESSION['logged_in']))
  {
    if($_SESSION['email']!='admin@admin.com')
    {
      $message = "You are not authorized to add a staff!";
      echo "<script>alert('$message');</script>";
      header('Refresh:0;url=profile.php');
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <script src="bootstrap/js/bootstrap.js"></script>

        <title>Add Product</title>
    </head>

    <body>

        <h1>Enter new product:</h1>
        <div class="container ">

            <form action="insertproduct.php" method="post">

                <div class="row">
                    <div class="col-lg-3">

                    </div>

                    <div class="col-lg-7">
                        <label for="productname">Product Name:</label>
                        <input class="form-control" type="text" name="productname"><br>
                    </div>
                    <div class="col-lg-3">

                    </div>

                    <div class="col-lg-7">
                        <label for="barid">Bar ID</label>
                        <input class="form-control" type="text" name="barid"><br></div>
                    <div class="col-lg-3">

                    </div>
                    <div class="col-lg-7">
                        <label for="basket">Basket Number:</label>
                        <input class="form-control" type="text" name="basket"><br></div>
                    <div class="col-lg-3">

                    </div>
                    <div class="col-lg-7">
                        <label for="category">Category</label>
                        <input class="form-control" type="text" name="category"><br></div>
                    <div class="col-lg-3">

                    </div>
                    <div class="col-lg-7">
                        <label for="shelf">Shelf Number:</label>
                        <input class="form-control" type="text" name="shelf"><br></div>
                    <div class="col-lg-3">

                    </div>
                    <div class="col-lg-7">
                        <label for="compartment">Compartment:</label>
                        <input class="form-control" type="text" name="compartment"><br></div>
                    <div class="col-lg-3">

                    </div>
                    <div class="col-lg-7">
                        <label for="floor">Floor</label>
                        <input class="form-control" type="text" name="floor"><br></div>
                    <div class="col-lg-3">

                    </div>
                    <br>


                </div>
                <div class="col-lg-6">

                </div>

                <input class="btn btn-danger" type="submit" value="Submit">
            </form>
        </div>



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
