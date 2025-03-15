<!DOCTYPE html>
<html lang="">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulier Verwerking</title>
  <link rel="stylesheet" href="assets/css/result.css"> <!-- Verwijzing naar de CSS-stylesheet -->

</head>

<body>
  <main>
    <header><!-- Header met navigatie en logo -->
      <div class="boven">
        <div class="menuLeft"><!-- Links menu voor taal selecteren -->
          <div>Taal</div>
          <div>
            <select name="Taal">
              <option value="English">English</option>
              <option value="Nederlands">Nederlands</option>
            </select>
          </div>
        </div>

        <div class="menuRight"><!-- Rechter navigatiebalk -->
          <div class="navbar">
            <div class="nav-link nav-link-ltr"><a href=""> Mijn Account </a></div>
            <div class="nav-link nav-link-ltr"><a href="bestelformulier.html"> Afrekenen</a></div>
            <div class="nav-link nav-link-ltr"><a href="inloggen.html">Inloggen</a></div>
          </div>
        </div>
      </div>

      <div class="onder">
        <div id="logo"><!-- Website logo -->
          <a href="index.html"><img src="assets/img/logo.png" alt="Bilco logo"></a>
        </div>
        <input type="text" value="" placeholder="Search" id="zoek" autofocus>
      </div>
    </header>

    <div>
      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Veilig invoer opschonen om XSS te voorkomen
        function sanitize_input($data)
        {
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
    </div>
    <footer>
      <div id="footerboven">
        <div class="footerboven"><a href=""> Algemene voorwaarden </a></div>
        <div class="footerboven"><a href=""> Privacybeleid </a></div>
        <div class="footerboven"><a href=""> Cookiebeleid </a></div>
        <div class="footerboven"><a href=""> Over Bilco </a></div>
        <div class="footerboven"><a href=""> Beveiligings melding </a></div>
      </div>
      <div id="footerbeneden">
        <div> &copy; 2025 Bilco</div>

      </div>
    </footer>
  </main>
</body>

</html>