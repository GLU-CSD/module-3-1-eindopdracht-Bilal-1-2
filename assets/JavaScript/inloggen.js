document.getElementById("login-form").addEventListener("submit", function(event) {
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    // Eenvoudige validatie
    if (email === "test@bilco.com" && password === "123456") {
      alert("Succesvol ingelogd!"); // Succesmelding
      window.location.href = "index.html";
    } else {
      alert("Ongeldige inloggegevens, probeer opnieuw."); // Foutmelding
      event.preventDefault();
    }
    
  }
);
// Selecteer de slider en het element dat de waarde weergeeft
const slider = document.getElementById("ringSlider");
const sliderValue = document.getElementById("sliderValue");

// Toon de standaard sliderwaarde met de valuta-indicatie
sliderValue.innerHTML = "€" + slider.value + (",00");
  
slider.oninput = function() {
  sliderValue.innerHTML = "€" + this.value + (",00");
}
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
