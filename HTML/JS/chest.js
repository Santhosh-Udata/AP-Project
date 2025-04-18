const menus = document.querySelectorAll(".chest-exercise");

menus.forEach(menu => {
    menu.addEventListener('mouseover', function () {
        this.style.transform = 'scale(1.01)';
        this.style.transition = "transform 0.6s ease";
    });

    menu.addEventListener('mouseout', function () {
        this.style.transform = 'scale(1)';
        this.style.transition = "transform 0.6s ease"
    });

    menu.addEventListener('mousedown', function () {
        this.style.transform = 'scale(0.99)';
        this.style.transition = "transform 0.6s ease"
    });

    menu.addEventListener('mouseup', function () {
        this.style.transform = 'scale(1)';
        this.style.transition = "transform 0.6s ease"
    });
});

document.querySelector(".chest-exercise").onclick = function () {
    const param = document.getElementById("bench-press").value;
    window.location.href = "layout.php?param=" + encodeURIComponent(param);
};

document.querySelector("#bench-press").onclick = function () {
    window.location.href = "bench-press.html";
};

document.querySelector(".cable-pec-fly").onclick = function () {
    window.location.href = "cable-pec-fly.html";
};