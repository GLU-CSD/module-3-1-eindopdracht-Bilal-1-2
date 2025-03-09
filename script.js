// Wacht tot de DOM volledig is geladen voordat de code wordt uitgevoerd
document.addEventListener("DOMContentLoaded", function () {
    // Selecteer alle knoppen met de class 'add-to-cart'
    let buttons = document.querySelectorAll(".add-to-cart");

    // Voeg een klikgebeurtenis toe aan elke knop
    buttons.forEach(button => {
        button.addEventListener("click", function (event) {
            event.preventDefault(); // 🔹 Voorkomt dat de standaard actie (pagina verversen) wordt uitgevoerd
            
            // Haal product- en prijsgegevens op uit de dataset attributen van de knop
            let product = this.getAttribute("data-product");
            let price = this.getAttribute("data-price");

            // Haal de bestaande winkelwagen uit LocalStorage of maak een nieuwe lege array
            let cart = JSON.parse(localStorage.getItem("cart")) || [];

            // Voeg het geselecteerde product toe aan de winkelwagen
            cart.push({ product, price });

            // Sla de bijgewerkte winkelwagen op in LocalStorage
            localStorage.setItem("cart", JSON.stringify(cart));

            // Toon een melding dat het product is toegevoegd aan de winkelwagen
            let message = document.getElementById("cart-message");
            message.innerText = `${product} toegevoegd aan je bestelling!`;
            message.style.display = "block";

            // Verberg de melding na 2 seconden
            setTimeout(() => {
                message.style.display = "none";
            }, 2000);
        });
    });
});

// Selecteer de slider en het element dat de waarde weergeeft
const slider = document.getElementById("ringSlider");
const sliderValue = document.getElementById("sliderValue");

// Toon de standaard sliderwaarde met de valuta-indicatie
sliderValue.innerHTML = "€" + slider.value + (",00");

// Bijwerken van de waarde terwijl de slider wordt verplaatst
slider.oninput = function() {
    sliderValue.innerHTML = "€" + this.value + (",00");
}

// Functie om de Nutri-score te selecteren
function selectScore(element) {
    // Verwijder de 'selected'-class van alle Nutri-score elementen
    const scores = document.querySelectorAll('.nutri-score div');
    scores.forEach(score => {
        score.classList.remove('selected');
    });

    // Voeg de 'selected'-class toe aan het aangeklikte Nutri-score element
    element.classList.add('selected');

    // Optioneel: voer extra acties uit op basis van de geselecteerde Nutri-score
    console.log(`Selected score: ${element.innerText}`);
}
