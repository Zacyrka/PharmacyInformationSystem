<?php
// Include the database connection file
include "../DuomenuBaze.php";

// Initialize error message variable
$klaidos_pranesimas = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $slapyvardis = $_POST['slapyvardis'];
    $slaptazodis = $_POST['slaptazodis'];

    // Check if the password meets the requirements
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]{9,}$/', $slaptazodis)) {
        $klaidos_pranesimas = "Slaptažodis turi būti bent 9 simbolių ilgio ir turėti raidžių, skaičių ir specialių simbolių.";
    } else {
        // Insert a new user into the database
        $query = "INSERT INTO prisijungimas (slapyvardis, slaptazodis) VALUES ('$slapyvardis', '$slaptazodis')";
        $result = mysqli_query($connection, $query);

        // Check if the insertion was successful
        if ($result) {
            $klaidos_pranesimas = "Naujas vartotojas pridėtas sėkmingai!";
        } else {
            $klaidos_pranesimas = "Įvyko klaida pridedant naują vartotoją: " . mysqli_error($connection);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="lt">

<head>
    <meta charset="UTF-8">
    <title>Pridėti naują vartotoją</title>
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

    <div class="content">
        <h1>Pridėti naują vartotoją</h1>
        <!-- Display error message if present -->
        <?php if ($klaidos_pranesimas !== "") : ?>
            <div class="error-message"><?php echo $klaidos_pranesimas; ?></div>
        <?php endif; ?>
        <!-- Form for adding a new user -->
        <form action="PridetiVartotoja.php" method="POST">
            <label for="slapyvardis">Slapyvardis:</label><br>
            <input type="text" id="slapyvardis" name="slapyvardis"><br><br>

            <label for="slaptazodis">Slaptažodis:</label><br>
            <input type="password" id="slaptazodis" name="slaptazodis"><br><br>

            <input type="submit" value="Pridėti vartotoją" name="submit">
        </form>
    </div>

</body>

</html>
