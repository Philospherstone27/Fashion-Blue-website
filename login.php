<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'mydb';

$con = mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);

if(mysqli_connect_error()) {
    exit('Error connecting to the database' . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
  
    // Check if the email and password are correct
    $sql = "SELECT customerid FROM customer WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        // The email and password are correct
        $row = mysqli_fetch_assoc($result);
        $customerid = $row["customerid"];

        // Start a session to store the customer ID
        session_start();

        // Store the customer ID in a session variable
        $_SESSION['customerid'] = $customerid;

        // Redirect to home page
        header("Location: home.html");
        exit();
    } else {
        // The email and/or password are incorrect
        echo "Login not Successful";
    }
}
?>
