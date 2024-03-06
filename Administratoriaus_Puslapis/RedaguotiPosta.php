<?php
// Include the database connection file
include "../DuomenuBaze.php";

// Check if the 'id' parameter is set in the URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Retrieve information about the record from the database based on the id
    $query = "SELECT * FROM postas WHERE id = $id ";
    $result = mysqli_query($connection, $query);
    
    // Check if the query was successful and if there are rows returned
    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="lt">

<head>
    <meta charset="UTF-8">
    <title>Redaguoti įrašą</title>
    <link rel="stylesheet" href="../Stiliai/Administratorius.css">
</head>

<body>
    <!-- Sidebar navigation links -->
    <div class="sidebar">
        <ul>
            <li><a href="PridetiPosta.php">Pridėti postą</a></li>
            <li><a href="PerziuretiPostus.php">Peržiūrėti postus</a></li>
            <li><a href="PerziuretiVartotojus.php">Peržiūrėti naudotojus</a></li>
            <li><a href="PridetiVartotoja.php">Pridėti naudotoją</a></li>
            <li><a href="../Pagrindinis_Puslapis/Pagrindinis.php">Grįžti atgal</a></li>
            <li><a href="../Atsijungti.php">Atsijungti</a></li>
        </ul>
    </div>

    <!-- Form to edit the record -->
    <div class="content">
        <h1>Redaguoti įrašą</h1>
        <form action="RedaguotiPosta.php" method="post">
            <!-- Hidden field to store the record ID -->
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="pavadinimas">Pavadinimas:</label><br>
            <!-- Input field to edit the 'pavadinimas' field -->
            <input type="text" id="pavadinimas" name="pavadinimas" value="<?php echo $row['pavadinimas']; ?>"><br><br>

            <label for="nuotrauka">Nuotrauka:</label><br>
            <!-- Input field to upload a new image -->
            <input type="file" id="nuotrauka" name="nuotrauka"><br><br>

            <label for="vienetai">Vienetai:</label><br>
            <!-- Input field to edit the 'vienetai' field -->
            <input type="text" id="vienetai" name="vienetai" value="<?php echo $row['vienetai']; ?>"><br><br>

            <label for="aprasymas">Aprašymas:</label><br>
            <!-- Textarea field to edit the 'aprasymas' field -->
            <textarea id="aprasymas" name="aprasymas"><?php echo $row['aprasymas']; ?></textarea><br><br>

            <!-- Submit button to update the record -->
            <input type="submit" value="Atnaujinti įrašą" name="submit">
        </form>
    </div>
</body>

</html>
<?php

    } else {
        echo "Nerasta įrašo su nurodytu ID";
    }
} else {
    // Check if the form is submitted
    if(isset($_POST['submit'])) {
        // Retrieve form data
        $id = $_POST['id'];
        $pavadinimas = $_POST['pavadinimas'];
        $nuotrauka = $_POST['nuotrauka'];
        $vienetai = $_POST['vienetai'];
        $aprasymas = $_POST['aprasymas'];

        // Update the record in the database
        $query = "UPDATE postas SET pavadinimas='$pavadinimas', nuotrauka='$nuotrauka', vienetai='$vienetai', aprasymas='$aprasymas' WHERE id=$id ";
        $result = mysqli_query($connection, $query);

        // Check if the update was successful
        if ($result) {
            header("Location: PerziuretiPostus.php ");
        } else {
            echo "Įvyko klaida atnaujinant įrašą: " . mysqli_error($connection);
        }
    }
}
?>
