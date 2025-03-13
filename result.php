<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulier Verwerking</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Veilig invoer opschonen om XSS te voorkomen
    function sanitize_input($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    // Formuliergegevens ophalen en controleren
    $aanhef = sanitize_input($_POST['aanhef'] ?? '');
    $voornaam = sanitize_input($_POST['voornaam'] ?? '');
    $tussenvoegsel = sanitize_input($_POST['tussenvoegsel'] ?? '');
    $achternaam = sanitize_input($_POST['achternaam'] ?? '');
    $adres = sanitize_input($_POST['adres'] ?? '');
    $huisnummer = sanitize_input($_POST['huisnummer'] ?? '');
    $postcode = sanitize_input($_POST['postcode'] ?? '');
    $email = sanitize_input($_POST['email'] ?? '');
    $land = sanitize_input($_POST['land'] ?? '');
    $telefoonnummer = sanitize_input($_POST['telefoonnummer'] ?? '');
    $gebortedatum = sanitize_input($_POST['gebortedatum'] ?? '');

    echo "<br>Aanhef: $aanhef";
    echo "<br>Voornaam: $voornaam";
    echo "<br>Tussenvoegsel: $tussenvoegsel";
    echo "<br>Achternaam: $achternaam";
    echo "<br>Adres: $adres";
    echo "<br>Huisnummer: $huisnummer";
    echo "<br>Postcode: $postcode";
    echo "<br>Email: $email";
    echo "<br>Land: $land";
    echo "<br>Telefoonnummer: $telefoonnummer";
    echo "<br>Geboortedatum: $gebortedatum";

    // Databaseverbinding
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bilco";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verbinding controleren
    if ($conn->connect_error) {
        die("Verbinding mislukt: " . $conn->connect_error);
    }
    echo "<br><br>Verbinding succesvol!";

    // Veilige SQL-query met prepared statements
    $sql = "INSERT INTO persoonsgegevens (aanhef, voornaam, tussenvoegsel, achternaam, adres, huisnummer, postcode, email, land, telefoonnummer, gebortedatum) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssss", $aanhef, $voornaam, $tussenvoegsel, $achternaam, $adres, $huisnummer, $postcode, $email, $land, $telefoonnummer, $gebortedatum);

    if ($stmt->execute()) {
        echo "<br>Nieuw record succesvol aangemaakt!";
    } else {
        echo "<br>Fout bij het invoegen: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
</body>
</html>
