<!DOCTYPE html>
<html lang="lt">

<head>
    <meta charset="UTF-8">
    <title>Kontaktai - Vaistinės informacinė sistema</title>
    <link rel="stylesheet" href="../Stiliai/Kontaktai.css"> <!-- Link to the CSS file -->
</head>

<body>
    <header>
        <h1>Vaistinės Informacinė sistema</h1> <!-- Heading of the page -->
    </header>

    <div class="container">
        <div class="right-section">
            <div class="center-section">
                <h2>Kontaktai</h2> <!-- Contact information section -->
                <p>Adresas: Adresas, Miestas, šalis, Pašto kodas</p> <!-- Address -->
                <p>Telefonas: +370 600 55555</p> <!-- Phone number -->
                <p>El. paštas: pastas@pastas.lt</p> <!-- Email address -->
                <p>Darbo valandos: I-V: 8:00 - 18:00, VI-VII: 9:00 - 15:00</p> <!-- Working hours -->
                <br>
                <p>Turite klausimų? Rašykite mums naudodamiesi žemiau esančia forma.</p> <!-- Invitation to contact -->
                <form action="siusti_paklausa.php" method="post"> <!-- Form for sending inquiries -->
                    <label for="vardas">Vardas:</label><br>
                    <input type="text" id="vardas" name="vardas" required><br><br> <!-- Input field for name -->
                    <label for="pastas">El. paštas:</label><br>
                    <input type="email" id="pastas" name="pastas" required><br><br> <!-- Input field for email -->
                    <label for="message">Žinutė:</label><br>
                    <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br> <!-- Textarea for message -->
                    <input type="submit" value="Siųsti"> <!-- Submit button -->
                </form>
            </div>
        </div>
    </div>
</body>

</html>
