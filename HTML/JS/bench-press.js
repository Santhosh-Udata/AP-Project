document.addEventListener("DOMContentLoaded", function () {
    var checkbox = document.getElementById("persistCheckbox");

    var storedValue = localStorage.getItem("checkboxChecked");
    console.log("Stored checkbox value:", storedValue);

    if (storedValue === "true") {
        checkbox.checked = true;
    } else {
        checkbox.checked = false;
    }

    checkbox.addEventListener("change", function () {
        console.log("Checkbox state changed to:", checkbox.checked);
        localStorage.setItem("checkboxChecked", checkbox.checked);
    });
});