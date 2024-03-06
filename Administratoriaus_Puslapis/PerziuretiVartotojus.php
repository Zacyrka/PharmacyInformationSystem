<?php
include "../DuomenuBaze.php";

$query = "SELECT * FROM prisijungimas";
$result = mysqli_query($connection, $query);

if ($result && mysqli_num_rows($result) > 0) {
?>

<!DOCTYPE html>
<html lang="lt">

<head>
    <meta charset="UTF-8">
    <title>Vartotojų peržiūra</title>
    <link rel="stylesheet" href="../Stiliai/Administratorius.css">
</head>

<body>
    <div class="sidebar">
        <!-- Sidebar links -->
    </div>

    <div class="content">
        <h1>Vartotojų peržiūra</h1>
        <!-- Table to display user details -->
        <table>
            <tr>
                <th>Slapyvardis</th>
                <th>Veiksmai</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['slapyvardis']; ?></td>
                    <td>
                        <!-- Links to edit or delete user -->
                        <a href="RedaguotiVartotoja.php?id=<?php echo $row['id']; ?>">Redaguoti</a>
                        <a href="PasalintiVartotoja.php?id=<?php echo $row['id']; ?>">Pašalinti</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>

<?php } else {
    echo "Nėra vartotojų";
} ?>
