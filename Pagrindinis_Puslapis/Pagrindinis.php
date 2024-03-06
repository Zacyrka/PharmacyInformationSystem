<?php session_start(); ?> <!-- Start PHP session -->

<!DOCTYPE html>
<html lang="lt">

<head>
    <meta charset="UTF-8">
    <title>Vaistinės informacinė sistema</title>
    <link rel="stylesheet" href="../Stiliai/Pagrindinis.css"> <!-- Link to the CSS file -->
</head>

<body>
    <header>       
        <h1>Vaistinės Informacinė sistema</h1>
        <nav>
            <ul>
                <li><a href="../Pradinis_Puslapis/ApieMus.php">Apie mus</a></li> <!-- Link to About Us page -->
                <li><a href="../Pradinis_Puslapis/Kontaktai.php">Kontaktai</a></li> <!-- Link to Contacts page -->
                <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1) { ?> <!-- Display Administrator link only for users with role 1 -->
                    <li><a href="Administratorius.php">Administratorius</a></li>
                <?php } ?>
                <li><a href="../Atsijungti.php">Atsijungti</a></li> <!-- Link to logout page -->
                <li><a href="Israsas.php">Išrašai</a></li> <!-- Link to Issuance page -->
                <li><a href="../Pagrindinis_Puslapis/Statistika.php">Statistika</a></li> <!-- Link to Statistics page -->
                <li><a href="Profilis.php">Profilis</a></li> <!-- Link to Profile page -->
            </ul>
        </nav>
    </header>
    <main>
        <section class="intro">
            <h2>Sveiki atvykę į vaistinės informacinę sistemą!</h2>
            <p>Šiame puslapyje pavaizduoti visi produktai, pavadinimai, nuotraukos, jų kiekis ir aprašymas</p>
        </section>
        <form method="post" action="">
            <input type="text" name="paieskos_zodis" placeholder="Įveskite paieškos žodį">
            <input type="submit" name="paieska_submit" value="Ieškoti">
        </form>
        <?php include "Paieska.php"; ?> <!-- Include search functionality -->
        <?php include "Postas.php"; ?> <!-- Include product display -->
    </main>

    <footer>
        <p>&copy; 2023 Vaistinės Informacinė sistema</p>
    </footer>
</body>

</html>
