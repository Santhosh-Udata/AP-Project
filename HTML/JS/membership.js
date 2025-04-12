const buy = document.querySelectorAll('.buy');

buy.forEach((temp) => {
    temp.onclick = function () {
        if (temp.classList.contains('b-2-99')) {
            window.location.href= "JS/images/3.jpg";
        }
        else if (temp.classList.contains('b-23-99')) {
            window.location.href= "JS/images/24.jpg";
        }
        else if (temp.classList.contains('b-5-99')) {
            window.location.href= "JS/images/6.jpg";
        }
        else if (temp.classList.contains('b-79-99')) {
            window.location.href= "JS/images/80.jpg";
        }
    };
});
