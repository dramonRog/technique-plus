document.getElementById("contactForm").addEventListener("submit", function (event) {
  event.preventDefault(); // zatrzymuje domyślne działani przeglądarki powiązanego z danym zdarzeniem.

  document.getElementById("nameError").textContent = "";
  document.getElementById("emailError").textContent = "";
  document.getElementById("messageError").textContent = "";
  document.getElementById("name").style.borderColor = "";
  document.getElementById("email").style.borderColor = "";
  document.getElementById("message").style.borderColor = "";

  const name = document.getElementById("name").value; // otrzymaj wartości wpisane przez użytkownika w formularze
  const email = document.getElementById("email").value;
  const message = document.getElementById("message").value;

  let isValid = true;

  const namePattern = /^[a-zA-Z\s]+$/; // pierwszy symbol(^) musi się zaczynać od a-z lub A-Z /s - skok(пропуск) + - musi być jakiś symbol $ - koniec ciągu, wszyskie symboly muszą być a-z lub A-Z lub spacja
  if (!namePattern.test(name)) { // czy pasuje ciąg znaków do tego wzoru
    document.getElementById("nameError").textContent =
      "Invalid name. Please use only letters.";
    document.getElementById("name").style.borderColor = "red";
    isValid = false;
  }

  const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/; // 1-n symboly: a-z A-Z 0-9 . _ % + -, dalej obowiązkowy symbol separator @, ... separator kropka(bez\ . - znaczy wszystko oprócz nowej linii) {2,} - minimum 2 symbola po kropce
  if (!emailPattern.test(email)) {
    document.getElementById("emailError").textContent =
      "Invalid email address.";
    document.getElementById("email").style.borderColor = "red";
    isValid = false;
  }

  if (message.trim().length === 0) { // trim() - usuń wszystkie białe znaków(spacja,tabulacja,nowa linia)
    document.getElementById("messageError").textContent =
      "Message cannot be empty.";
    document.getElementById("message").style.borderColor = "red";
    isValid = false;
  }

  if (isValid) { // jeżeli wszystkie wymogi są wykonane
    document.getElementById("contactForm").reset(); // zwrócz wszystkie pola formularza dla wpisywania wartości początkowych (domyślnych)

    const successOverlay = document.getElementById("successOverlay"); // nasze okienko z wiadomością

    if (successOverlay) { // czy istnieje wartość ta w HTML
      successOverlay.classList.add("show"); // lista wszystkich klas przypisanych do #successOverlay, dodaj im do nazwy klasy "show", jeżeli już jest to słowo, nic nie robi
      document.body.style.overflow = "hidden"; // zabierz scroll

      const closeTimeout = setTimeout(() => { // zmienna dla kontroli
        closeModal();
      }, 3000); // zamknij za 3 sekundu
      
      document.getElementById("closeModal").addEventListener("click", function () {
        clearTimeout(closeTimeout); // jeżeli był przycisk na krzyżek, anuluj oczekiwanie do zamykania
        closeModal(); // zamknij
      });
    }
  }
});

function closeModal() { 
  const successOverlay = document.getElementById("successOverlay");
  successOverlay.classList.remove("show");
  document.body.style.overflow = "auto";  // wrócz scroll
}
