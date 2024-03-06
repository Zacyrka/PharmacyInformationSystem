<?php
session_start(); // Start the session

// Check if a user is logged in
if (isset($_SESSION['user_role']) || isset($_SESSION['slapyvardis'])) {
    // Log out the user by unsetting session variables and destroying the session
    unset($_SESSION['user_role']);
    unset($_SESSION['slapyvardis']);
    session_destroy(); // Destroy the session
}

// Redirect the user to the login page or elsewhere
header("Location: Pradinis_Puslapis/Pradinis.php"); // Redirect to the initial page
exit(); // Exit script execution
?>
