<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Search Results</title>
</head>
<body>
    <?php
    // Check if the form has been submitted
    if(isset($_GET['search'])) {
        // Retrieve the search term from the form
        $search = $_GET['search'];
        
        // Perform the search query (replace this with your own database query)
        $results = array(
            array('title' => 'Product 1', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
            array('title' => 'Product 2', 'description' => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
            array('title' => 'Product 3', 'description' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),
            array('title' => 'Product 4', 'description' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'),
            array('title' => 'Product 5', 'description' => 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.')
        );
        
        // Display the search results
        echo '<h1>Search Results for "' . $search . '"</h1>';
        
        if(empty($results)) {
            echo '<p>No results found.</p>';
        } else {
            foreach($results as $result) {
                echo '<h2>' . $result['title'] . '</h2>';
                echo '<p>' . $result['description'] . '</p>';
            }
        }
    }
    ?>
    
    <form action="search.php" method="get">
        <label for="search">Search:</label>
        <input type="text" id="search" name="search">
        <button type="submit">Search</button>
    </form>
</body>
</html>
