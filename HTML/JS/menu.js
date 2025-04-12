const menus = document.querySelectorAll('.menu');

menus.forEach(menu => {
    menu.addEventListener('mouseover', function () {
        this.style.transform = 'scale(1.1)';
        this.style.transition = "transform 0.6s ease";
    });

    menu.addEventListener('mouseout', function () {
        this.style.transform = 'scale(1)';
        this.style.transition = "transform 0.6s ease"
    });

    menu.addEventListener('mousedown', function () {
        this.style.transform = 'scale(0.9)';
        this.style.transition = "transform 0.6s ease"
    });

    menu.addEventListener('mouseup', function () {
        this.style.transform = 'scale(1)';
        this.style.transition = "transform 0.6s ease"
    });
});