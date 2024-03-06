<?php
include "../DuomenuBaze.php"; // Include database connection file
session_start(); // Start session to access session variables

// Get information of the logged-in user
$user_id = $_SESSION['id']; // Get user ID from session
$query = "SELECT * FROM prisijungimas WHERE id = $user_id"; // SQL query to select user information
$result = mysqli_query($connection, $query); // Execute the query

if ($result) {
    if ($row = mysqli_fetch_assoc($result)) {
        $user = $row; // Store user information in $user array
    } else {
        echo "Nepavyko gauti vartotojo informacijos."; // Display error message if user information couldn't be retrieved
    }
} else {
    echo "Klaida užklausoje: " . mysqli_error($connection); // Display error message if query execution fails
}

// Close database connection
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="lt">

<head>
    <meta charset="UTF-8">
    <title>Vartotojo profilis</title>
    <link rel="stylesheet" href="../Stiliai/Profilis.css"> <!-- Link to the CSS file -->
</head>

<body>
    <h1>Vartotojo Profilis</h1>
    
    <div class="profile-info">
        <p><strong>Vartotojo ID:</strong> <?php echo $user['id']; ?></p> <!-- Display user ID -->
        <p><strong>Vartotojo vardas:</strong> <?php echo $user['slapyvardis']; ?></p> <!-- Display username -->
        <p><strong>Vaidmuo:</strong> 
            <?php 
                if($user['vaidmuo'] == 1)
                    echo 'Administratorius';
                else
                    echo 'Naudotojas'; // Display user role (Administrator or User)
            ?>
        </p>
    </div>

    <a href="../Atsijungti.php">Atsijungti</a> <!-- Logout link -->
    <a href="../Pagrindinis_Puslapis/Pagrindinis.php">Grįžti atgal</a> <!-- Link to go back to the main page -->

</body>

</html>
