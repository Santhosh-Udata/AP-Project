const buy = document.querySelectorAll('.buy');

buy.forEach((temp) => {
    temp.onclick = function () {
        if (temp.classList.contains('b-2-99')) {
            window.open("JS/images/3.jpg", "_blank");
        }
        else if (temp.classList.contains('b-23-99')) {
            window.open("JS/images/24.jpg", "_blank");
        }
        else if (temp.classList.contains('b-5-99')) {
            window.open("JS/images/6.jpg", "_blank");
        }
        else if (temp.classList.contains('b-79-99')) {
            window.open("JS/images/80.jpg", "_blank");
        }
    };
});