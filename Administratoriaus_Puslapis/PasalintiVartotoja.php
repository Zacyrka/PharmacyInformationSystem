<?php
include "../DuomenuBaze.php"; // Include the database connection file

if(isset($_GET['id'])) { // Check if the 'id' parameter is set in the URL
    $id = $_GET['id']; // Get the user ID from the URL
    
    // Construct the DELETE query to remove the user based on the provided ID
    $deleteQuery = "DELETE FROM prisijungimas WHERE id = $id";
    
    // Execute the DELETE query
    $deleteResult = mysqli_query($connection, $deleteQuery);

    if ($deleteResult) { // Check if the query execution was successful
        echo "Vartotojas sėkmingai ištrintas!"; // Display success message
        header("Location: ../Administratoriaus_Puslapis/PerziuretiVartotojus.php "); // Redirect to the user list page
    } else {
        echo "Įvyko klaida trinant vartotoją: " . mysqli_error($connection); // Display error message if deletion fails
    }
} else {
    echo "Nenurodytas vartotojo ID parametras"; // Display message if user ID parameter is not provided in the URL
}
?>
