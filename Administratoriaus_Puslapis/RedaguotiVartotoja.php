<?php
// Include the database connection file
include "../DuomenuBaze.php";

// Check if 'id' parameter is set in the URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Retrieve information about the user from the database based on the id
    $query = "SELECT * FROM prisijungimas WHERE id = $id ";
    $result = mysqli_query($connection, $query);
    
    // Check if the query was successful and if there are rows returned
    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="lt">

<head>
    <meta charset="UTF-8">
    <title>Redaguoti vartotoją</title>
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

    <!-- Form to edit the user -->
    <div class="content">
        <h1>Redaguoti vartotoją</h1>
        <!-- Display error message if exists -->
        <?php if (isset($klaidos_pranesimas) && $klaidos_pranesimas !== "") : ?>
            <div class="error-message"><?php echo $klaidos_pranesimas; ?></div>
        <?php endif; ?>

        <form action="RedaguotiVartotoja.php" method="post">
            <!-- Hidden field to store the user ID -->
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="slapyvardis">Slapyvardis:</label><br>
            <!-- Input field to edit the 'slapyvardis' field -->
            <input type="text" id="slapyvardis" name="slapyvardis" value="<?php echo $row['slapyvardis']; ?>"><br><br>

            <label for="slaptazodis">Slaptažodis:</label><br>
            <!-- Input field to edit the 'slaptazodis' field -->
            <input type="password" id="slaptazodis" name="slaptazodis" value="<?php echo $row['slaptazodis']; ?>"><br><br>

            <!-- Other user attributes -->

            <!-- Submit button to update the user -->
            <input type="submit" value="Atnaujinti vartotoją" name="submit">
        </form>
    </div>
</body>

</html>
<?php

    } else {
        echo "Nerasta vartotojo su nurodytu ID";
    }
} else {
    // Check if the form is submitted
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $slapyvardis = $_POST['slapyvardis'];
        $slaptazodis = $_POST['slaptazodis'];
            
        // Validate the password
        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]{9,}$/', $slaptazodis)) {
            $klaidos_pranesimas = "Slaptažodis turi būti bent 9 simbolių ilgio ir turėti raidžių, skaičių ir specialių simbolių.";
            header("Location: PerziuretiVartotojus.php ");    
        } else {
            // Update user information in the database
            $query = "UPDATE prisijungimas SET slapyvardis='$slapyvardis', slaptazodis='$slaptazodis' WHERE id=$id ";
            $result = mysqli_query($connection, $query);

            // Check if the update was successful
            if ($result) {
                echo "Vartotojo informacija atnaujinta sėkmingai!";
                header("Location: PerziuretiVartotojus.php ");
            } else {
                $klaidos_pranesimas . mysqli_error($connection);
            }
        }
    }
}
?>
