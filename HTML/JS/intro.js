let animation = document.querySelector('.motivation');

animation.onmouseover = function () {
    animation.style.transform = "scale(1.03)";
    //animation2.style.borderLeft = " 1.5px solid transparent";
    animation.style.transition = "transform 0.35s ease-in-out";
};

animation.onmouseout = function () {
    animation.style.transform = "scale(1)";
    //animation2.style.borderLeft = "1.5px orange solid";
    animation.style.transition = "transform 0.35s ease-in-out";
};
