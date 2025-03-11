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
  });