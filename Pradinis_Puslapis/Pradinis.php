<!DOCTYPE html>
<html lang="lt">

<head>
    <meta charset="UTF-8">
    <title>Vaistinės informacinė sistema</title>
    <link rel="stylesheet" href="../Stiliai/Pradinio_Stilius.css"> <!-- Link to the CSS file -->
</head>

<body>
    <header>
        <h1>Vaistinės Informacinė sistema</h1> <!-- Heading of the page -->
    </header>
    <div class="container">
        <div class="right-section">
            <div class="center-section">
                <div class="login-section">
                    <h2>Prisijungimas</h2> <!-- Login section -->
                    <form action="../Prisijungimas.php" method="post"> <!-- Form for user login -->
                        <input type="text" placeholder="Naudotojo vardas" name="username"><br><br> <!-- Input field for username -->
                        <input type="password" placeholder="Slaptažodis" name="password"><br><br> <!-- Input field for password -->
                        <button name="login" type="submit">Prisijungti</button> <!-- Login button -->
                    </form>
                    <br><br>
                    <p class="login-link"><a href="#">Pamiršote slaptažodį?</a></p> <!-- Forgot password link -->
                </div>
                <div class="contact-section">
                    <li><a href="ApieMus.php">Apie mus</a></li> <!-- Link to the About Us page -->
                    <li><a href="Kontaktai.php">Kontaktai</a></li> <!-- Link to the Contacts page -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>