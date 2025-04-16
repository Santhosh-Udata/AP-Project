fetch("get-username.php")
    .then(response => response.text())
    .then(name => {
        document.querySelector(".user-name").textContent = name;
    })
    .catch(error => {
        console.error("Failed to load username:", error);
        document.querySelector(".user-name").textContent = "Guest";
    });