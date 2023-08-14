// Nav
const nav = document.querySelector(".nav-menu");
const navigation = document.querySelector(".navigation");
const openBtn = document.querySelector(".hamburger");
const closeBtn = document.querySelector(".close");

const navLeft = nav.getBoundingClientRect().left;
openBtn.addEventListener("click", () => {
  if (navLeft < 0) {
    navigation.classList.add("show");
    nav.classList.add("show");
    document.body.classList.add("show");
  }
});

closeBtn.addEventListener("click", () => {
  if (navLeft < 0) {
    navigation.classList.remove("show");
    nav.classList.remove("show");
    document.body.classList.remove("show");
  }
});

// Fixed Nav
const navBar = document.querySelector(".navigation");
const navHeight = navBar.getBoundingClientRect().height;
window.addEventListener("scroll", () => {
  const scrollHeight = window.pageYOffset;
  if (scrollHeight > navHeight) {
    navBar.classList.add("fix-nav");
  } else {
    navBar.classList.remove("fix-nav");
  }
});


// Slide show in product


const glide1 = document.getElementById("glide1");
const glide2 = document.getElementById("glide2");

if (glide1) {
  new Glide(glide1, {
    type: "carousel",
    startAt: 0,
    perView: 3,
    rewin: false,
    autoplay: 3000,
    animationDuration: 800,
    animationTimingFunc: "cubic-bezier(0.165, 0.840, 0.440, 1.000)",
    breakpoints: {
      998: {
        perView: 2,
      },
      768: {
        perView: 1,
      },
    },
  }).mount();
}


if (glide2)
  new Glide(glide2, {
    type: "carousel",
    startAt: 0,
    perView: 5,
    
    animationDuration: 800,
    animationTimingFunc: "cubic-bezier(0.165, 0.840, 0.440, 1.000)",
    breakpoints: {
      1200: {
        perView: 3,
      },
      768: {
        perView: 2,
      },
    },
  }).mount();
