<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'mydb';

// Connect to the database
$con = mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);

// Check if there was an error connecting to the database
if(mysqli_connect_error()) {
    exit('Error connecting to the database' . mysqli_connect_error());
}

// Start a session to get the customer ID
session_start();
$customerid = $_SESSION['customerid'];

// Get the product name and price from the POST request
$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];

// Get the product ID from the product table based on the product name
$sql = "SELECT productid FROM product WHERE name = '$product_name'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$productid = $row['productid'];

// Insert the order into the customer_order table
$sql = "INSERT INTO customer_order (customerid, productid, price) VALUES ('$customerid', '$productid', '$product_price')";
if (mysqli_query($con, $sql)) {
    echo "Product added to cart!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

// Close the database connection
mysqli_close($con);
?>

