let count = sessionStorage.getItem("historyCount") || 0;
count = parseInt(count) + 1;
sessionStorage.setItem("historyCount", count);

const back = document.querySelector(".back");
back.addEventListener("click", function () {
    let count = sessionStorage.getItem("historyCount");

        window.history.go(-count);
        sessionStorage.removeItem("historyCount");

});