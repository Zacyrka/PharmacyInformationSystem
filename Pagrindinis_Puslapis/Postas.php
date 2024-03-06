<?php
include "../DuomenuBaze.php"; // Include database connection file

$query = "SELECT * FROM postas"; // SQL query to select all posts from the database
$selelectAllPosts = mysqli_query($connection, $query); // Execute the query

?>

<!DOCTYPE html>
<html lang="lt">

<head>
    <meta charset="UTF-8">
    <title><?php echo $posto_pavadinimas; ?></title> <!-- Dynamic page title -->
    <link rel="stylesheet" href="../Stiliai/Postas.css"> <!-- Link to the CSS file -->
</head>

<body>
   <?php
        if($selelectAllPosts) 
        {

            while($row = mysqli_fetch_assoc($selelectAllPosts))
            {
                $posto_pavadinimas = $row["pavadinimas"]; // Get product name
                $nuotrauka = $row["nuotrauka"]; // Get product image
                $vnt = $row["vienetai"]; // Get product quantity
                $aprasymas = $row["aprasymas"]; // Get product description
    ?>
    <div class="post-container"> <!-- Container for each product -->
        <h1><?php echo $posto_pavadinimas; ?></h1> <!-- Display product name -->
        <img src="../Nuotraukos/<?php echo $nuotrauka; ?>" alt="Posto nuotrauka"> <!-- Display product image -->
        <p class="quantity">Kiekis: <?php echo $vnt; ?></p> <!-- Display product quantity -->
        <p><?php echo $aprasymas; ?></p> <!-- Display product description -->
    </div>
    
    <?php
            }
        }
    ?>
</body>

</html>
