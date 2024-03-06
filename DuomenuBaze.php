<?php
// Establish connection to the MySQL database
$connection = mysqli_connect("localhost", "root", "", "vaistinesinfosistema");

// Check if the connection was successful
if ($connection) {
    // If connection is successful, you can perform database operations
    // Uncomment the line below if you want to display a message indicating successful connection
    // echo "connected";
} else {
    // If connection fails, you may want to handle the error appropriately
    // For example, you can display an error message or log the error
    die("Connection failed: " . mysqli_connect_error());
}
?>
