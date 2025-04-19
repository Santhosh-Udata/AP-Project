
const logout = document.querySelector(".log-out");

/*logout.addEventListener("click", function () {
    if (confirm("Are you sure you want to log out?")) {
        alert("You have logged out successfully.");
        window.location.href = "project.php";
    }
});*/

const username = localStorage.getItem("user_name");

document.addEventListener("DOMContentLoaded", function () {
    const orderLink = document.querySelector(".order-tag");

    if (username) {
        orderLink.href = `store.html?username=${username}`;
    } else {
        orderLink.href = "store.html";
    }
});


document.addEventListener("DOMContentLoaded", function () {
    const user_name = document.querySelector(".user-name");
    user_name.innerHTML = username || "Guest";
    user_name.style.cursor = "default"; 
});