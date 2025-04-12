const thresholdheight = window.innerHeight * 0.7;

function header1() {
    document.querySelector(".header-title").style.color = "white";
    document.querySelectorAll(".header-tag").forEach(tag => tag.style.color = "white");
    document.querySelector(".header").style.backgroundColor = "rgba(0, 0, 0, 0.5)";
    document.querySelector(".profile").src = "images/login-icon-white.png";
    document.querySelector(".store").src = "images/store-icon-white.png";

    document.querySelector(".header").style.transition = "all 0.5s";
    document.querySelector(".header-title").style.transition = "all 0.5s";
    document.querySelectorAll(".header-tag").forEach(tag => tag.style.transition = "all 0.5s");
    document.querySelector(".profile").style.transition = "all 0.5s";
    document.querySelector(".store").style.transition = "all 0.5s";
};

function header2() {
    document.querySelector(".header-title").style.color = "black";
    document.querySelectorAll(".header-tag").forEach(tag => tag.style.color = "black");
    document.querySelector(".header").style.backgroundColor = "rgb(211,211,211)";
    document.querySelector(".profile").src = "images/login-icon.png";
    document.querySelector(".store").src = "images/store-icon.png";

    document.querySelector(".header").style.transition = "all 0.5s";
    document.querySelector(".header-title").style.transition = "all 0.5s";
    document.querySelectorAll(".header-tag").forEach(tag => tag.style.transition = "all 0.5s");
    document.querySelector(".profile").style.transition = "all 0.5s";
    document.querySelector(".store").style.transition = "all 0.5s";
};

window.onscroll = function() {
    if (window.scrollY <= thresholdheight)
    {
        header1();
        console.log("header1");
    }
    else
    {
        header2();
        console.log("header2");
    }
};