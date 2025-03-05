
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
