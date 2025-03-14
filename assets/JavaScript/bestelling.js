// Laad de inhoud van de winkelwagen wanneer de pagina geladen is
document.addEventListener("DOMContentLoaded", function () {
  let cart = JSON.parse(localStorage.getItem("cart")) || [];
  let orderList = document.getElementById("order-list");
  if (cart.length === 0) {
    orderList.innerHTML = "<p>Je winkelwagen is leeg.</p>";
  } else {
    cart.forEach((item) => {
      let listItem = document.createElement("li");
      listItem.textContent = item.product + " - €" + item.price; // Changed back to string concatenation
      orderList.appendChild(listItem);
    });
  }
});

document.querySelector("form").addEventListener("submit", function () {
  localStorage.removeItem("cart");
});

// Validate form function

function validateForm() {
  let fields = [
    {
      id: "aanhef",
      alertId: "alertBijAanhef",
      message: "Kies  je voor een aanhef.",
    },
    {
      id: "voornaam",
      alertId: "alertBijNaam",
      message: "Naam moet ingevuld worden.",
    },
    {
      id: "achternaam",
      alertId: "alertBijAchternaam",
      message: "Achternaam moet ingevuld worden.",
    },
    {
      id: "adres",
      alertId: "alertBijAdres",
      message: "Adres moet ingevuld worden.",
    },
    {
      id: "huisnummer",
      alertId: "alertBijHuisnummer",
      message: "Huisnummer moet ingevuld worden.",
    },
    {
      id: "postcode",
      alertId: "alertBijPostcode",
      message: "Postcode moet ingevuld worden.",
    },
    {
      id: "email",
      alertId: "alertBijEmail",
      message: "Email moet ingevuld worden.",
    },
    {
      id: "land",
      alertId: "alertBijLand",
      message: "Land moet ingevuld worden.",
    },
    {
      id: "telefoonnummer",
      alertId: "alertBijTelefoonnummer",
      message: "Telefoonnummer moet ingevuld worden.",
    },
    {
      id: "gebortedatum",
      alertId: "alertBijGebortedatum",
      message: "Geboortedatum moet ingevuld worden.",
    },
  ];

  let isValid = true;
  for (let field of fields) {
    let value = document.getElementById(field.id).value.trim();
    let alertElement = document.getElementById(field.alertId);
    if (value === "") {
      alertElement.innerHTML = field.message;
      alertElement.style.color = "red";
      isValid = false;
    } else {
      alertElement.innerHTML = "";
    }
  }

  return isValid;
}
