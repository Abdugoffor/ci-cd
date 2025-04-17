document.addEventListener("DOMContentLoaded", function () {
  const menuBtn = document.querySelector(".menu-btn");
  const mobileMenu = document.querySelector(".mobile-menu");
  const body = document.body;
  const header = document.querySelector(".header");

  if (menuBtn && mobileMenu && header) {
    function toggleMenu() {
      const isActive = mobileMenu.classList.toggle("active");
      menuBtn.classList.toggle("active", isActive);

      if (isActive) {
        body.style.overflow = "hidden";
        body.style.position = "fixed";
        body.style.width = "100%";
        header.style.height = "100vh";
      } else {
        body.style.overflow = "";
        body.style.position = "";
        body.style.width = "";
        header.style.height = "";
      }
    }

    menuBtn.addEventListener("click", toggleMenu);

    document.addEventListener("click", function (e) {
      if (!menuBtn.contains(e.target) && !mobileMenu.contains(e.target)) {
        menuBtn.classList.remove("active");
        mobileMenu.classList.remove("active");
        body.style.overflow = "";
        body.style.position = "";
        body.style.width = "";
        header.style.height = "";
      }
    });
  }

  // Language selector functionality
  const langBtns = document.querySelectorAll(".lang-btn");
  const langLinks = document.querySelectorAll(".lang-list a, .lang-dropdown a");

  function updateLanguage(lang) {
    langLinks.forEach((link) => {
      if (link.getAttribute("href").includes(lang)) {
        link.classList.add("active");
      } else {
        link.classList.remove("active");
      }
    });

    langBtns.forEach((btn) => {
      btn.textContent = lang.toUpperCase();
    });

    localStorage.setItem("selectedLanguage", lang);
  }

  if (langLinks.length > 0) {
    langLinks.forEach((link) => {
      link.addEventListener("click", (e) => {
        e.preventDefault();
        const lang = link.getAttribute("href").split("=")[1];
        updateLanguage(lang);
      });
    });

    const urlParams = new URLSearchParams(window.location.search);
    const savedLang = localStorage.getItem("selectedLanguage");
    const currentLang = urlParams.get("lang") || savedLang || "en";
    updateLanguage(currentLang);
  }

  // Sponsors slider
  if (document.querySelector(".sponsors-slider")) {
    new Swiper(".sponsors-slider", {
      slidesPerView: 5,
      spaceBetween: 30,
      loop: true,
      loopedSlides: 6,
      autoplay: false,
      speed: 800,
      grabCursor: true,
      breakpoints: {
        320: { slidesPerView: 1, spaceBetween: 10 },
        768: { slidesPerView: 3, spaceBetween: 20 },
        1024: { slidesPerView: 5, spaceBetween: 30 },
        1280: { slidesPerView: 5, spaceBetween: 30 },
      },
    });
  }

  // Hotels slider
  if (document.querySelector(".hotels-slider")) {
    new Swiper(".hotels-slider", {
      slidesPerView: "auto",
      spaceBetween: 30,
      grabCursor: true,
      speed: 600,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        320: { slidesPerView: 1, spaceBetween: 10 },
        548: { slidesPerView: 1, spaceBetween: 20 },
        768: { slidesPerView: 1, spaceBetween: 24 },
        1024: { slidesPerView: "auto", spaceBetween: 30 },
      },
    });
  }

  // News slider
  if (document.querySelector(".news-slider")) {
    new Swiper(".news-slider", {
      slidesPerView: 3,
      spaceBetween: 30,
      grabCursor: true,
      speed: 600,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        320: { slidesPerView: 1, spaceBetween: 20 },
        768: { slidesPerView: "auto", spaceBetween: 24 },
        1024: { slidesPerView: 3, spaceBetween: 30 },
      },
    });
  }

  const dateInputs = document.querySelectorAll(".date-input");
  dateInputs.forEach((input) => {
    if (input.value) {
      updateDate(input);
    }
  });

  document.addEventListener("click", function (event) {
    const container = event.target.closest(".date-container");
    if (container) {
      const dateInput = container.querySelector(".date-input");
      if (dateInput) {
        dateInput.showPicker();
      }
    }
  });

  document.addEventListener("change", function (event) {
    if (event.target.classList.contains("date-input")) {
      updateDate(event.target);
    }
  });

  // Verification input
  const inputs = document.querySelectorAll(".verification-input");
  const verifyButton = document.querySelector(".btn-form");

  if (inputs.length && verifyButton) {
    function checkInputs() {
      const allFilled = [...inputs].every((input) => input.value.trim() !== "");
      if (allFilled) {
        verifyButton.classList.remove("disabled");
        verifyButton.removeAttribute("disabled");
      } else {
        verifyButton.classList.add("disabled");
        verifyButton.setAttribute("disabled", "true");
      }
    }

    inputs.forEach((input, index) => {
      input.addEventListener("input", (e) => {
        if (!/^\d$/.test(e.target.value)) {
          e.target.value = "";
          return;
        }

        if (index < inputs.length - 1 && e.target.value) {
          inputs[index + 1].focus();
        }

        checkInputs();
      });

      input.addEventListener("keydown", (e) => {
        if (e.key === "Backspace" && !e.target.value && index > 0) {
          inputs[index - 1].focus();
        }
      });

      input.addEventListener("paste", (e) => {
        e.preventDefault();
        const pastedText = (e.clipboardData || window.clipboardData).getData("text");

        if (/^\d{6}$/.test(pastedText)) {
          pastedText.split("").forEach((char, i) => {
            if (inputs[i]) inputs[i].value = char;
          });

          inputs[inputs.length - 1].focus();
          checkInputs();
        }
      });
    });

    verifyButton.setAttribute("disabled", "true");
    verifyButton.classList.add("disabled");

    const form = document.querySelector("form");
    if (form) {
      form.addEventListener("submit", function (e) {
        e.preventDefault();
        const code = [...inputs].map((input) => input.value).join("");
        console.log("code:", code);
      });
    }
  }

  document.querySelectorAll(".lang-dropdown a").forEach((link) => {
    link.addEventListener("click", function (event) {
      event.preventDefault();
      window.location.href = this.href;
    });
  });

  // FIDE ID check modal
  const fideModal = document.getElementById("modal");
  const fideForm = document.getElementById("fideForm");
  const closeModal = document.querySelector(".close");

  if (fideForm && fideModal && closeModal) {
    fideForm.addEventListener("submit", function (e) {
      e.preventDefault();
      fideModal.classList.add("active");
      disableScroll();
    });

    closeModal.addEventListener("click", function () {
      fideModal.classList.remove("active");
      enableScroll();
    });

    fideModal.addEventListener("click", function (e) {
      if (e.target === fideModal) {
        fideModal.classList.remove("active");
        enableScroll();
      }
    });
  }

  const hotelModal = document.querySelector(".hotel-modal");
  const hotelClose = document.querySelector(".modal-close");
  const hotelImages = document.querySelectorAll(".hotel-img");

  if (hotelModal && hotelClose && hotelImages.length > 0) {
    const swiperInstance = new Swiper(".hotel-swiper", {
      loop: true,
      navigation: {
        nextEl: ".custom-swiper-button-next",
        prevEl: ".custom-swiper-button-prev",
      },
    });

    hotelImages.forEach((img, index) => {
      img.addEventListener("click", function () {
        hotelModal.classList.add("active");
        swiperInstance.slideTo(index, 0);
        disableScroll();
      });
    });

    hotelClose.addEventListener("click", function () {
      hotelModal.classList.remove("active");
      enableScroll();
    });

    hotelModal.addEventListener("click", function (e) {
      if (e.target === hotelModal) {
        hotelModal.classList.remove("active");
        enableScroll();
      }
    });
  }

  const fileInput = document.getElementById("fileInput");
  const fileNameDisplay = document.getElementById("fileName");

  if (fileInput && fileNameDisplay) {
    fileInput.addEventListener("change", function () {
      const fileName = this.files[0] ? this.files[0].name : "No file chosen";
      fileNameDisplay.textContent = fileName;
    });
  }

  const photoInput = document.getElementById("photoInput");
  const photoNameDisplay = document.getElementById("photoName");

  if (photoInput && photoNameDisplay) {
    photoInput.addEventListener("change", function () {
      const fileName = this.files[0] ? this.files[0].name : "No file chosen";
      photoNameDisplay.textContent = fileName;
    });
  }

  function updateDate(input) {
    const container = input.closest(".date-container");
    const datePlaceholder = container ? container.querySelector(".placeholder") : null;

    if (input.value && datePlaceholder) {
      const [year, month, day] = input.value.split("-");
      const formattedDate = `${day}/${month}/${year}`;
      datePlaceholder.textContent = formattedDate;
      datePlaceholder.style.color = "#000";
    }
  }

  function disableScroll() {
    document.body.style.overflow = "hidden";
    document.documentElement.style.overflow = "hidden";
  }

  function enableScroll() {
    document.body.style.overflow = "";
    document.documentElement.style.overflow = "";
  }
});
