<?php
include "DuomenuBaze.php"; // Include the database connection file

session_start(); // Start the session

if(isset($_POST['login'])) { // Check if the login form is submitted
    $username = $_POST['username']; // Get the username from the form
    $password = $_POST['password']; // Get the password from the form

    // Escape special characters in the username and password to prevent SQL injection
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    // Construct the SELECT query to fetch user data based on the username
    $query = "SELECT * FROM prisijungimas WHERE slapyvardis = '{$username}' ";
    
    // Execute the SELECT query
    $selectUserQuery = mysqli_query($connection, $query);

    // Check if the query execution was successful
    if(!$selectUserQuery) {
        die("Nera" . mysqli_error($connection)); // Display an error message if query fails
    }

    // Fetch user data from the query result
    while($row = mysqli_fetch_array($selectUserQuery)) {
        $id = $row['id'];
        $slapyvardis = $row['slapyvardis'];
        $slaptazodis = $row['slaptazodis'];
        $vaidmuo = $row['vaidmuo']; // Fetch user role from the database
    }

    // Check if the provided username and password match with the fetched data
    if($username === $slapyvardis && $password === $slaptazodis) {
        // If credentials are correct, set session variables and redirect to the main page
        $_SESSION['id'] = $id;
        $_SESSION['slapyvardis'] = $slapyvardis;
        $_SESSION['slaptazodis'] = $slaptazodis;
        $_SESSION['user_role'] = $vaidmuo; // Set user role in session

        header("Location: Pagrindinis_Puslapis/Pagrindinis.php "); // Redirect to the main page
    } else {
        // If credentials are incorrect, display an error message and redirect to the login page
        echo "NEVEIKIA"; // Display an error message
        header("Location: Pradinis_Puslapis/Pradinis.php "); // Redirect to the login page
    }
}
?>
