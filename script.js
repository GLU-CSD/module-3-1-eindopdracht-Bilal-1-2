document.addEventListener("DOMContentLoaded", function () {
    let buttons = document.querySelectorAll(".add-to-cart");

    buttons.forEach(button => {
        button.addEventListener("click", function (event) {
            event.preventDefault(); // 🔹 Voorkomt dat de pagina ververst
            
            let product = this.getAttribute("data-product");
            let price = this.getAttribute("data-price");

            // Haal bestaande winkelwagen op of maak een nieuwe array
            let cart = JSON.parse(localStorage.getItem("cart")) || [];

            // Voeg product toe
            cart.push({ product, price });

            // Sla op in LocalStorage
            localStorage.setItem("cart", JSON.stringify(cart));

            // Toon een melding
            let message = document.getElementById("cart-message");
            message.innerText = `${product} toegevoegd aan je bestelling!`;
            message.style.display = "block";

            // Verberg melding na 2 seconden
            setTimeout(() => {
                message.style.display = "none";
            }, 2000);
        });
    });
});

const slider = document.getElementById("ringSlider");
const sliderValue = document.getElementById("sliderValue");
sliderValue.innerHTML = "€" + slider.value; // Display the default slider value with currency

slider.oninput = function() {
    sliderValue.innerHTML = "€" + this.value; // Update the current slider value (each time you drag the slider handle)
}

// Function to select the Nutri-score
function selectScore(element) {
    // Remove the 'selected' class from all score elements
    const scores = document.querySelectorAll('.nutri-score div');
    scores.forEach(score => {
        score.classList.remove('selected');
    });

    // Add the 'selected' class to the clicked score element
    element.classList.add('selected');

    // Optionally, you can perform additional actions based on the selected score
    console.log(`Selected score: ${element.innerText}`);
}
