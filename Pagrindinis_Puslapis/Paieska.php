<?php
    include "../DuomenuBaze.php"; // Include database connection file

    if (isset($_POST['paieska_submit'])) { // Check if the search form is submitted
        $paieskosZodis = $_POST['paieskos_zodis']; // Get the search keyword

        $query = "SELECT * FROM postas WHERE pavadinimas LIKE '%$paieskosZodis%'"; // SQL query to search for products based on the keyword
        $result = mysqli_query($connection, $query); // Execute the query

        if ($result && mysqli_num_rows($result) > 0) { // Check if there are results
            while ($row = mysqli_fetch_assoc($result)) { // Loop through each result
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
        } else {
            echo "Nerasta jokių rezultatų."; // Display message if no results found
        }
    }
?>
