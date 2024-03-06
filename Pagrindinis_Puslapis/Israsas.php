<!-- Israsas.php -->

<!DOCTYPE html>
<html lang="lt">

<head>
    <meta charset="UTF-8">
    <title>Israsas</title>
    <link rel="stylesheet" href="../Stiliai/Israsas.css"> <!-- Link to the CSS file -->
</head>

<body>
    <h1>Išrašas</h1>

    <form method="post" action="Israsas.php">
        <label for="produkto_pasirinkimas">Pasirinkite produktą:</label>
        <select name="produkto_pasirinkimas" id="produkto_pasirinkimas">
            <?php
              include "../DuomenuBaze.php"; // Include database connection file

              // Get all products from the database
              $result = mysqli_query($connection, "SELECT id, pavadinimas FROM postas");

              // Display product names in the selection dropdown
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<option value='" . $row['id'] . "'>" . $row['pavadinimas'] . "</option>";
              }
            ?>
        </select>
        <label for="kiekis">Kiekis:</label>
        <input type="number" name="kiekis" id="kiekis" min="1">
        <input type="submit" name="israsas_submit" value="Išrašyti">
        <a href="../Pagrindinis_Puslapis/Pagrindinis.php">Grįžti į pagrindinį puslapį</a>
    </form>

    <?php
    include "../DuomenuBaze.php"; // Include database connection file

    if (isset($_POST['israsas_submit'])) {
        $produkto_id = $_POST['produkto_pasirinkimas'];
        $kiekis = $_POST['kiekis'];

        // Update product in the database by reducing its quantity
        $update_query = "UPDATE postas SET vienetai = vienetai - $kiekis WHERE id = $produkto_id";

        if (mysqli_query($connection, $update_query)) {
            echo "Produkto kiekis sumažintas.";
            header("Location: Israsas.php"); // Redirect to the same page after update
        } else {
            echo "Klaida: " . $update_query . "<br>" . mysqli_error($connection); // Display error if update fails
        }

        // Insert record into history table
        $insert_query = "INSERT INTO istorija (pavadinimas, aprasymas, vienetai) SELECT pavadinimas, aprasymas, $kiekis FROM postas WHERE id = $produkto_id";
        mysqli_query($connection, $insert_query);
    }

    // Display history
    $historyQuery = "SELECT * FROM istorija";
    $historyResult = mysqli_query($connection, $historyQuery);

    if ($historyResult) {
        echo "<table>"; // Start history table
        echo "<caption>ISTORIJA</caption>"; // Caption for history table
        echo "<thead><tr><th>Pavadinimas</th><th>Aprašymas</th><th>Kiekis</th></tr></thead>"; // Table header
        echo "<tbody>"; // Table body
        while ($row = mysqli_fetch_assoc($historyResult)) {
            echo "<tr>"; // Table row
            echo "<td>" . $row['pavadinimas'] . "</td>"; // Product name column
            echo "<td>" . $row['aprasymas'] . "</td>"; // Description column
            echo "<td>" . $row['vienetai'] . "</td>"; // Quantity column
            echo "</tr>"; // End of table row
        }
        echo "</tbody>"; // End of table body
        echo "</table>"; // End of history table
    } else {
        echo "Klaida: nepavyko gauti istorijos: " . mysqli_error($connection); // Display error if history retrieval fails
    }

    // Close database connection
    mysqli_close($connection);
    ?>
</body>

</html>
