fetch("get-username.php")
    .then(response => response.text())
    .then(name => {
        document.querySelector(".user-name").textContent = name;
    })
    .catch(error => {
        console.error("Failed to load username:", error);
        document.querySelector(".user-name").textContent = "Guest";
    });

const logout = document.querySelector(".log-out");

/*logout.addEventListener("click", function () {
    if (confirm("Are you sure you want to log out?")) {
        alert("You have logged out successfully.");
        window.location.href = "project.php";
    }
});

const order = document.querySelector(".orders");

order.addEventListener("click", function () {
        window.location.href = "store.html";
});*/