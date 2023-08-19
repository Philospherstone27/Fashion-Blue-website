<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'mydb';

$con = mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);

if(mysqli_connect_error()) {
    exit('Error connecting to the database' . mysqli_connect_error());
}
if (isset($_POST['first_name'])) {
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
} else {
    $first_name = '';
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];
    $password = $_POST["password"];
    $address = $_POST["address"];
  
    // Insert the data into the database
    $sql = "INSERT INTO customer (first_name, last_name, email, phone_number, password, address)
    VALUES ('$first_name', '$last_name', '$email', '$phone_number', '$password', '$address')";
  }
if (mysqli_query($con, $sql)) {
    echo "Data added successfully.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

// Close the database connection
mysqli_close($con);
?>
