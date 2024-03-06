<?php
include "../DuomenuBaze.php";

// Handle form submission
if (isset($_POST['submit'])) {
    // Retrieve form data
    $pavadinimas = $_POST['pavadinimas'];
    $nuotrauka = $_POST['nuotrauka'];
    $vienetai = $_POST['vienetai'];
    $aprasymas = $_POST['aprasymas'];

    // Construct SQL query to insert a new record
    $query = "INSERT INTO postas (pavadinimas, nuotrauka, vienetai, aprasymas) 
              VALUES ('$pavadinimas', '$nuotrauka', '$vienetai', '$aprasymas')";

    // Execute the query
    $result = mysqli_query($connection, $query);

    // Check if the insertion was successful
    if ($result) {
        echo "Įrašas pridėtas sėkmingai!";
    } else {
        echo "Įvyko klaida pridedant įrašą: " . mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html lang="lt">

<head>
    <meta charset="UTF-8">
    <title>Administratorius</title>
    <link rel="stylesheet" href="../Stiliai/Administratorius.css">
</head>

<body>
    <div class="sidebar">
        <!-- Sidebar navigation links -->
        <ul>
            <li><a href="PridetiPosta.php">Pridėti postą</a></li>
            <li><a href="PerziuretiPostus.php">Peržiūrėti postus</a></li>
            <li><a href="PerziuretiVartotojus.php">Peržiūrėti naudotojus</a></li>
            <li><a href="PridetiVartotoja.php">Pridėti naudotoją</a></li>
            <li><a href="../Pagrindinis_Puslapis/Pagrindinis.php">Grįžti atgal</a></li>
            <li><a href="../Atsijungti.php">Atsijungti</a></li>
        </ul>
    </div>

    <div class="content">
        <h1>Pridėti naują produktą</h1>
        <!-- Form for adding a new product -->
        <form action="PridetiPosta.php" method="POST">
            <label for="pavadinimas">Pavadinimas:</label><br>
            <input type="text" id="pavadinimas" name="pavadinimas"><br><br>

            <label for="nuotrauka">Nuotrauka:</label><br>
            <input type="file" id="nuotrauka" name="nuotrauka"><br><br>

            <label for="vienetai">Vienetai:</label><br>
            <input type="text" id="vienetai" name="vienetai"><br><br>

            <label for="aprasymas">Aprašymas:</label><br>
            <textarea id="aprasymas" name="aprasymas"></textarea><br><br>

            <input type="submit" value="Pridėti įrašą" name="submit">
        </form>
    </div>
</body>

</html>
