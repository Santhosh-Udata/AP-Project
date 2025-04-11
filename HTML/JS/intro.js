let animation = document.querySelector('.motivation');

animation.onmouseover = function () {
    let animation2 = document.querySelector('.text-in-motive');
    animation2.style.transform = "scaleX(1.03)";
    //animation2.style.borderLeft = " 1.5px solid transparent";
    animation2.style.transition = "transform 0.5s ease-in-out";
};

animation.onmouseout = function () {
    let animation2 = document.querySelector('.text-in-motive');
    animation2.style.transform = "scaleX(1)";
    //animation2.style.borderLeft = "1.5px orange solid";
    animation2.style.transition = "transform 0.5s ease-in-out";
};
