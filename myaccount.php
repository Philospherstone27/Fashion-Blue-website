<?php
require_once('db.php');
$query = "SELECT first_name, address, email, phone_number FROM customer WHERE customerid = 2";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
    <head>
    <meta name ="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="pictures/logo.png" type="image/x-icon">
    <title>My Account</title>
    <link rel="stylesheet" href="home.css">
    </head>
    <body>
        <header>
            <a href="home.html"><img src="pictures/home.jpg" alt="home" class="home-img"></a>
            <ul>
                <li class="written"><a href="product.html">Products</a></li>
                <li class="written"><a href="aboutus.html">About Us</a></li>
                <li><a href="cart2.html"><img src="pictures/cart.jpg" alt="My Cart" height="50px" width="50px"></a></li>
                <a id="search-icon" href="#"><img src="pictures/search.png" alt="search" height="40px" width="40px"></a>
                <li><a href="myaccount.php"><img src="pictures/myaccount.jpg" alt="My Cart" height="40px" width="40px"></a></li>
            </ul>
            <div id="search-bar" class="search-bar">
                <input type="text" placeholder="Search...">
            </div>
        </header>
        <main>
            <div class = "blockA">
                <h1>Your Account</h1>
                <br>
                <br>
                <br>
                <a href="cart2.html"><h4>Go to Cart</h4></a>
                <a href="home.html"><h4>Go home</h4></a>
                <a href="index.html"><h4>Log Out</h4></a>
            </div>
            <div class="blockB">
                <img src="pictures/myaccount.jpg" alt="My Account">
                <p>
                <b>Name:</b> <?php echo $row['first_name']; ?> <br>
                <b>Address:</b> <?php echo $row['address']; ?> <br>
                <b>Email Address:</b> <?php echo $row['email']; ?> <br>
                <b>Phone Number:</b> <?php echo $row['phone_number']; ?> <br>
                </p>

            </div>
        </main>
        <script>
        const searchIcon = document.getElementById("search-icon");
        const searchBar = document.getElementById("search-bar");
    
        searchIcon.addEventListener("click", () => {
          searchBar.classList.toggle("active");
        });
        </script>
                        
    </body>
</html>