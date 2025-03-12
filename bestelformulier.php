<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestelformulier</title>
    <!-- Koppeling naar het CSS-bestand voor de stijl van het bestelformulier -->
    <link rel="stylesheet" href="assets/css/bestelformulier.css">
  <script src="assets/JavaScript/bestelling.js" defer></script> <!-- JavaScript wordt asynchroon geladen -->
    
    <!-- Favicon voor de website -->
    <link rel="icon" href="assets/img/favicon.ico" sizes="any">
    <link rel="icon" href="assets/img/icon.png" type="image/svg+xml">
    <link rel="apple-touch-icon" href="assets/img/icon.png">
</head>
<body>
    <!-- Header sectie met taalselectie, navigatie en logo -->
    <header> 
        <div class="boven">
            <div class="menuLeft">
              <div>Taal</div>
              <div>
                <!-- Dropdown voor taalselectie -->
                <select name="Taal">
                  <option value="English">English</option>
                  <option value="Nederlands">Nederlands</option>
                </select>
              </div>
            </div>
            <div class="menuRight">
                <div class="navbar">
                  <!-- Navigatielinks -->
                  <div class="nav-link nav-link-ltr"><a href=""> Mijn Account </a></div>
                  <div class="nav-link nav-link-ltr"><a href="bestelformulier.html"> Afrekenen</a></div>
                  <div class="nav-link nav-link-ltr"><a href="inloggen.html">Inloggen</a></div>
                </div>
            </div>
        </div>
        <div class="onder">
            <!-- Logo van de website -->
            <div id="logo">
               <a href="index.html"><img src="assets/img/logo.png" alt="Logo"></a>
            </div>
        </div>
    </header>

    <!-- Formulier voor het plaatsen van een bestelling -->
    <div id="formulier">
        <form action="result.php" method="post">
            <!-- Sectie voor persoonlijke gegevens -->
            <fieldset>
                <legend>Bestelformulier</legend>
                <!-- Aanhef dropdown -->
                <label for="aanhef">Aanhef:</label>
                <select name="aanhef" id="aanhef" required>
                    <option value="" disabled selected>Kies een optie</option>
                    <option value="Dhr">Dhr.</option>
                    <option value="Mevr">Mevr.</option>
                </select>
                <!-- Voornaam invoerveld -->
                <label for="voornaam">Voornaam:</label>
                <input type="text" name="voornaam" id="voornaam" placeholder="Voornaam"required>
                <!-- Tussenvoegsel invoerveld -->
                <label for="tussenvoegsel">Tussenvoegsel:</label>
                <input type="text" name="tussenvoegsel" id="tussenvoegsel" placeholder="Tussenvoegsel">
                <!-- Achternaam invoerveld -->
                <label for="achternaam">Achternaam:</label>
                <input type="text" name="achternaam" id="achternaam" placeholder="achternaam"  required>
                <!-- Adresgegevens -->
                <div style="display: flex; justify-content: space-between;">
                    <div style="width:40%;">
                        <label for="adres">Straatnaam:</label>
                        <input type="text" name="adres" id="adres" placeholder="adres" required>
                    </div >
                    <div style="width:30%;">
                        <label for="huisnummer">Huisnummer:</label>
                        <input type="text" name="huisnummer" id="huisnummer" placeholder="huisnummer" required>
                    </div>
                    <div style="width:30%;">
                        <label for="postcode">Postcode:</label>
                        <input type="text" name="postcode" id="postcode" placeholder="postcode"  required pattern="[0-9]{4}[A-Za-z]{2}" title="Vul een geldige postcode in (bijv. 1234AB)">
                    </div>
                </div>
                <!-- E-mail invoerveld -->
                <label for="email">E-mail:</label>
                <input type="email" name="email" id="email" placeholder="email" required>
                <!-- Land dropdown -->
                <label for="land">Land:</label>
                <select name="land" id="land" required>
                    <option value="" disabled selected>Selecteer een land</option>
                    <option value="Nederland">Nederland</option>
                    <option value="Belgie">België</option>
                </select>
                <!-- Telefoonnummer invoerveld -->
                <label for="telefoonnummer">Telefoonnummer:</label>
                <input type="tel" name="telefoonnummer" id="telefoonnummer" placeholder="telefoonnummer" required pattern="\d{10}" title="Vul een geldig telefoonnummer in (minimaal 10 cijfers)">
                <!-- Geboortedatum invoerveld -->
                <label for="gebortedatum">Geboortedatum:</label>
                <input type="date" name="gebortedatum" id="gebortedatum" required>
            </fieldset>

            <!-- Sectie voor de bestelling -->
            <fieldset>
                <legend>Jouw bestelling</legend>
                <!-- Lijst met bestelde producten -->
                <ul id="order-list"></ul>
            </fieldset>

            <!-- Sectie voor opmerkingen -->
            <fieldset>
                <legend>Opmerkingen</legend>
                <textarea name="opmerking" rows="5" cols="40" placeholder="Uw bericht..."></textarea>
            </fieldset>

            <!-- Knoppen voor het plaatsen en herstellen van de bestelling -->
            <fieldset>
                <input type="submit" value="Bestelling plaatsen">
                <input type="reset" value="Herstellen">
            </fieldset>
        </form>
    </div>

    <!-- Footer sectie met links naar beleid en copyright informatie -->
    <footer>
        <div id="footerboven">
          <div class="footerboven"><a href=""> Algemene voorwaarden </a></div>
          <div class="footerboven"><a href=""> Privacybeleid  </a></div>
          <div class="footerboven"><a href=""> Cookiebeleid  </a></div>
          <div class="footerboven"><a href=""> Over Bilco  </a></div>
          <div class="footerboven"><a href="">Beveiligings melding  </a></div>
        </div>
        <div id="footerbeneden">
            <div> &copy; 2025 Bilco</div> 
            <div> &copy; 2025 Bilco</div>
            <div> &copy; 2025 Bilco</div>
            <div> &copy; 2025 Bilco</div>
            <div> &copy; 2025 Bilco</div>

        </div>
    </footer>

    <?php


?>

</body>
</html>