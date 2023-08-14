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

//toggle password

const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#password");

togglePassword.addEventListener("click", function (e) {
	// toggle the type attribute
	const type =
		password.getAttribute("type") === "password" ? "text" : "password";
	password.setAttribute("type", type);
	// toggle the eye / eye slash icon
	this.classList.toggle("bi-eye");
});

//===========login=============

const loginText = document.querySelector(".title-text .login");
const loginForm = document.querySelector("form.login");
const loginBtn = document.querySelector("label.login");
const signupBtn = document.querySelector("label.signup");
signupBtn.onclick = () => {
	loginForm.style.marginLeft = "-50%";
	loginText.style.marginLeft = "-50%";
};
loginBtn.onclick = () => {
	loginForm.style.marginLeft = "0%";
	loginText.style.marginLeft = "0%";
};
