<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    hchhc
</head>
<body>
<?php
$aanhef = $_POST['aanhef'];
$voornaam = $_POST['voornaam'];
$tussenvoegsel=$_post['tussenvoegsel'];
    $achternaam = $_POST['achternaam'];
    $adres = $_POST['adres'];   
    $huisnummer = $_POST['huisnummer'];   
    $postcode = $_POST['postcode'];   
    $email = $_POST['email'];
    $land = $_POST['land'];   
    $telefoonnummer = $_POST['telefoonnummer'];   
    $gebortedatum = $_POST['gebortedatum'];   
    
    
    echo ("<br>aanhef: " . $aanhef);
    echo ("<br>Voornaam: " . $voornaam);
    echo ("<br>Achternaam: " . $achternaam);
    echo ("<br>tussenvoegsel: " . $tussenvoegsel);
    echo ("<br>adres: " . $adres);
    echo ("<br>huisnummer: " . $huisnummer);
    echo ("<br>postcode: " . $postcode);
    echo ("<br>Email: " . $email);
    echo ("<br>land: " . $land);
    echo ("<br>telefoonnummer: " . $telefoonnummer);
    echo ("<br>gebortedatum: " . $gebortedatum);


    //----------- database connection

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "formphp";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "<br><br>Connected successfully";

    //------------ insert data into database

    $sql = "INSERT INTO persoonsgegevens (voornaam, achternaam, email)
VALUES ('" . $voornaam . "', '" . $achternaam . "', '" . $email . "')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();



    ?>
    
</body>
</html>