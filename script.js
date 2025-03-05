
  document.addEventListener("DOMContentLoaded", function () {
      // Selecteer alle "Add to cart" knoppen
      let buttons = document.querySelectorAll(".add-to-cart");

      buttons.forEach(button => {
          button.addEventListener("click", function () {
              let product = this.getAttribute("data-product"); 
              let price = this.getAttribute("data-price");

              // Haal bestaande items op of maak een lege array
              let cart = JSON.parse(localStorage.getItem("cart")) || [];

              // Voeg nieuw product toe
              cart.push({ product, price });

              // Opslaan in LocalStorage
              localStorage.setItem("cart", JSON.stringify(cart));

              alert(product + " is toegevoegd aan je bestelling!");
          });
      });
  });

