<?php
include "../DuomenuBaze.php";

// Execute query to retrieve all records from the 'postas' table
$query = "SELECT * FROM postas";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="lt">

<head>
    <meta charset="UTF-8">
    <title>Peržiūrėti postus</title>
    <link rel="stylesheet" href="../Stiliai/Administratorius.css">
    <link rel="stylesheet" href="f.css">
</head>

<body>
    <div class="sidebar">
            <!-- Sidebar links -->
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
        <h1>Visi įrašai</h1>
        <!-- Table to display records -->
        <table>
            <tr>
                <th>Pavadinimas</th>
                <th>Nuotrauka</th>
                <th>Vienetai</th>
                <th>Aprašymas</th>
                <th>Veiksmai</th>
            </tr>
            <?php
            // Loop through each record and display in table rows
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["pavadinimas"] . "</td>";
                    echo "<td><img width='150' src='../Nuotraukos/" . $row["nuotrauka"] . "' alt='Nuotrauka'></td>";
                    echo "<td>" . $row["vienetai"] . "</td>";
                    echo "<td>" . $row["aprasymas"] . "</td>";
                    echo "<td>";
                    // Delete and edit links with record ID as parameter
                    echo "<a href='../Istrinti.php?id=" . $row['id'] . "'>Ištrinti</a>";
                    echo " | ";
                    echo "<a href='RedaguotiPosta.php?id=" . $row['id'] . "'>Redaguoti</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Nėra įrašų</td></tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>
