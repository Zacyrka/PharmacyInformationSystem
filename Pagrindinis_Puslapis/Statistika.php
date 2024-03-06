<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <title>Statistika apie vaistus inventoriuje</title>
    <link rel="stylesheet" href="../Stiliai/Statistika.css"> <!-- Link to the CSS file -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Include Chart.js library -->
</head>
<body>
    <h1>Statistika</h1>
    <a href="Statistika2.php">Kita statistika</a> <!-- Link to another statistics page -->
    <a href="Pagrindinis.php">Gristį atgal</a> <!-- Link to go back to the main page -->
    <canvas id="myChart" width="400" height="400"></canvas> <!-- Canvas element for chart -->

    <?php
    // Connect to the database
    include "../DuomenuBaze.php";

    // Retrieve data from the database
    $query = "SELECT pavadinimas, vienetai FROM postas GROUP BY vienetai DESC"; 
    $result = mysqli_query($connection, $query);

    // Initialize arrays to store data
    $labels = [];
    $data = [];

    // Check if the query was successful
    if (!$result) {
        die("Klaida užklausoje: " . mysqli_error($connection));
    }

    // Store data in arrays
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($labels, $row['pavadinimas']);
            array_push($data, $row['vienetai']);
        }
    }

    // Close database connection
    mysqli_close($connection);
    ?>

    <script>
        // Data retrieved from PHP using PHP-JavaScript interaction
        const labels = <?php echo json_encode($labels); ?>;
        const data = <?php echo json_encode($data); ?>;

        const config = {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Produktų kiekiai',
                    backgroundColor: 'rgb(67, 118, 108)',
                    borderColor: 'rgb(128, 188, 189)',
                    data: data,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Display the chart using Chart.js
        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</body>
</html>
