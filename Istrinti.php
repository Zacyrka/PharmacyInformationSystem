<?php
include "DuomenuBaze.php"; // Include the database connection file

if (isset($_GET['id'])) { // Check if the 'id' parameter is set in the URL
    $id = $_GET['id']; // Get the value of 'id' parameter from the URL

    // Construct the DELETE query to delete the record with the specified ID
    $query = "DELETE FROM postas WHERE id = $id";
    
    // Execute the DELETE query
    $result = mysqli_query($connection, $query);

    if ($result) {
        // If deletion is successful, display success message
        echo "Įrašas sėkmingai ištrintas!";
        
        // Redirect the user to the page for viewing posts
        header("Location: Administratoriaus_Puslapis/PerziuretiPostus.php");
        exit(); // Terminate the script execution
    } else {
        // If an error occurs during deletion, display error message
        echo "Įvyko klaida trinant įrašą: " . mysqli_error($connection);
    }
}
?>
