<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>
</head>
<body>

    <h1>Enter new product:</h1>

    <form  action="insertproduct.php" method="post">
        <label for="productname">Product Name:</label>
        <input type="text" name="productname"><br>

        <label for="barid">Bar ID</label>
        <input type="text" name="barid" ><br>


        <label for="basket">Basket Number:</label>
        <input type="text" name="basket"><br>

        <label for="category">Category</label>
        <input type="text" name="category"><br>

        <label for="shelf">Shelf Number:</label>
        <input type="text" name="shelf" ><br>

        <label for="compartment">Compartment:</label>
        <input type="text" name="compartment"><br>

        <label for="floor">Floor</label>
        <input type="text" name="floor" ><br>
        <br>

        <input type="submit" value="Submit">
    </form>



</body>
</html>
