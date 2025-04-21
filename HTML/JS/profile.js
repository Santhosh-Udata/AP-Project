// profile.js
document.addEventListener("DOMContentLoaded", function () {

    const urlParams = new URLSearchParams(window.location.search);
    const urlUsername = urlParams.get('username');
    
    if (urlUsername) {
        sessionStorage.setItem('currentUser', urlUsername);
    }

    const username = sessionStorage.getItem('currentUser');

    const user_name = document.querySelector(".user-name");
    if (user_name) {
        user_name.textContent = username.toUpperCase() || "GUEST";
        user_name.style.cursor = "default";
    }
});