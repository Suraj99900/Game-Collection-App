// ======================= toggler style switcher
const styleSwitcherToggler = document.querySelector(".style-switcher-toggler");
styleSwitcherToggler.addEventListener("click", () => {
    document.querySelector(".style-switcher").classList.toggle("open");
})

// hide style switcher on scroll
window.addEventListener("scroll", () => {
    if (document.querySelector(".style-switcher").classList.toggle("open")) {
        document.querySelector(".style-switcher").classList.remove("open");
    }
})

// ======================== teme colors
const alternateStyle = document.querySelectorAll(".alternate-style");
function setActivityStyle(color) {
    alternateStyle.forEach((style) => {
        if (color == style.getAttribute("title")) {
            style.removeAttribute("disabled");
            sessionStorage.setItem("selectedColorData", color);
        }
        else {
            style.setAttribute("disabled", "true");
        }
    })
}

// ================= theme light and dark mode

const dayNight = document.querySelector(".day-night");

dayNight.addEventListener("click", () => {
    dayNight.querySelector("i").classList.toggle("fa-sun");
    dayNight.querySelector("i").classList.toggle("fa-moon");
    var isDarkMode = document.body.classList.toggle("dark");
    sessionStorage.setItem("oDayNightColor", isDarkMode ? "night" : "day");
})

window.addEventListener("load", () => {
    const storedDayNight = sessionStorage.getItem("oDayNightColor");
    if (storedDayNight) {
        document.body.classList.toggle("dark", storedDayNight === "night");
    }
    if (document.body.classList.contains("dark")) {
        dayNight.querySelector("i").classList.add("fa-sun");
    } else {
        dayNight.querySelector("i").classList.add("fa-moon");
    }
    
})

$(document).ready(()=>{
    setActivityStyle(sessionStorage.getItem("selectedColorData"));
})