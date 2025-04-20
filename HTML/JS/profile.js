// profile.js
document.addEventListener("DOMContentLoaded", function () {
    // 1. First check URL parameters
    const urlParams = new URLSearchParams(window.location.search);
    const urlUsername = urlParams.get('username');
    
    // 2. Sync with sessionStorage
    if (urlUsername) {
        sessionStorage.setItem('currentUser', urlUsername);
    }

    // 3. Get username from sessionStorage (not localStorage)
    const username = sessionStorage.getItem('currentUser');

    // 4. Update DOM element
    const user_name = document.querySelector(".user-name");
    if (user_name) {
        user_name.textContent = username || "Guest";  // Use textContent instead of innerHTML
        user_name.style.cursor = "default";
    }
});