// Laad de inhoud van de winkelwagen wanneer de pagina geladen is
document.addEventListener("DOMContentLoaded", function () {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    let orderList = document.getElementById("order-list");
    if (cart.length === 0) {
        orderList.innerHTML = "<p>Je winkelwagen is leeg.</p>";
    } else {
        cart.forEach(item => {
            let listItem = document.createElement("li");
            listItem.textContent = `${item.product} - €${item.price}`;
            orderList.appendChild(listItem);
        });
    }
});

// Sla de ingevoerde formuliergegevens op in localStorage
document.querySelector("form").addEventListener("input", function() {
    const formData = {
        voornaam: document.getElementById("voornaam").value,
        tussenvoegsel: document.getElementById("tussenvoegsel").value,
        achternaam: document.getElementById("achternaam").value,
        adres: document.getElementById("adres").value,
        huisnummer: document.getElementById("huisnummer").value,
        postcode: document.getElementById("postcode").value,
        email: document.getElementById("email").value,
        land: document.getElementById("land").value,
        telefoonnummer: document.getElementById("telefoonnummer").value,
        gebortedatum: document.getElementById("gebortedatum").value
    };
    localStorage.setItem("formData", JSON.stringify(formData));
});

// Verwijder de opgeslagen formuliergegevens bij het resetten van het formulier
document.querySelector("form").addEventListener("reset", function() {
    localStorage.removeItem("formData");
});
document.querySelector("form").addEventListener("submit", function() {
    localStorage.removeItem("cart");
});