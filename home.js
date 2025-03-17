// 'PRZESKOCZ NA INNA STRONE' SCRIPT(jQ1)
$(document).ready(function () { // wykonaj funkcję po załadowaniu całęgo dokumentu HTML
  $(".slider-item").on("click", function () { // on() - dołącza jeden lub więcej programów obsługi zdarzeń do wybranych elementów i elementów podrzędnych.
    window.location.href = "products.html#product-container"; // nowa lokacja okna przeglądarki
  });
});

// SLIDER SCRIPT(JS2)
const prevButton = document.querySelector(".prev-slide"); // document - obiekt reprezentujący całą stronę html
const nextButton = document.querySelector(".next-slide"); // querySelector - zwraca pierwszy taki element
const slider = document.querySelector(".slider"); 
const dots = document.querySelectorAll(".dot"); // otrzymamy NodeList ze wszystkich elementów

let activeIndex = 0;

prevButton.addEventListener("click", function () {
  const lastSlide = slider.lastElementChild;

  slider.removeChild(lastSlide); 
  slider.prepend(lastSlide); // prepend: wstaw element na początek

  activeIndex = (activeIndex - 1 + dots.length) % dots.length; // przesuwaj o jeden w prawo, jeżeli ten indeks jest na 0, to zostanie ostatnim
  dots.forEach((dot, index) => { // dla każdego elementa wykonaj funkcje z argumentami (dot, index)
    dot.classList.toggle("active", index === activeIndex); // toggle() podobnym jest do add() tylko jeżeli istnieje element ze słówkom "active" - usuń te słówko, index === activeIndex - warunek, kiedy toggle() zadziałą
  });
});

nextButton.addEventListener("click", function () {
  const firstSlide = slider.firstElementChild;

  slider.removeChild(firstSlide);
  slider.appendChild(firstSlide); // appendChild - dodaj dziecko po ostatnim już istniejącym dzeckiem 
  activeIndex = (activeIndex + 1) % dots.length; // przesuje na lewo
  dots.forEach((dot, index) => {
    dot.classList.toggle("active", index === activeIndex);
  });
});

// ANIMACJA WYGLADU ELEMENTU PRZY SCROLL(jQ2)
$(document).ready(function () {
  $(".info-section").css({
    marginTop: 50, // dodaj odstęp od dolu
  });

  $(window).on("scroll", function () { // kiedy odbywa się scrolling do
    $(".info-section").each(function () { // każdy  element info-section do
      var element = $(this); // "this" odnosi się do aktualnego elementu .info-section. this w jQuery odnosi się do elementu DOM, na którym wykonujesz operację. 
      var elementOffset = element.offset().top; // odległość między górnej krawędzi strony oraz elementem
      var windowScrollTop = $(window).scrollTop(); // odległości w pikselach, jaką strona została przewinięta od górnej krawędzi okna przeglądarki
      var windowHeight = $(window).height(); // wysokość okna przeglądarki

      if (elementOffset < windowScrollTop + windowHeight - 100) { // sprawdza, czy element na stronie jest w zasięgu widocznej części okna przeglądarki (czyli czy element jest blisko widocznej strefy, ale jeszcze nie całkowicie w niej widoczny).
        if (!element.hasClass("visible")) { 
          element.stop(true, true).animate( // stop() - zatrzymaj wszystkie animacje, true - zatrzymaj animacje natychmiast, true(drugie) - usuń animacje kolejki elementów
            { // .animate() - po zatrzymywaniu animacji utworz nową animację
              opacity: 1,
              marginTop: 0, // usuń odstęp
            },
            1000 // do it 1 second
          ); 
          element.addClass("visible"); // dodaj klas do diva
        }
      }
    });
  });

  $(window).trigger("scroll"); // triggle = Wywołuje zdarzenie ("scroll" w tym przypadku, jakby użytkownik przewijał stronę).
});
