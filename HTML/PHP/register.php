<?php
if(isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm-password"];

    // Check if the passwords match
    if ($password === $confirm_password) {
        // Here you would typically save the user to a database
        // For demonstration, we'll just redirect to a success page
        header("Location: ../login.html"); // or any other result page
        exit;
    } else {
        // Show alert and redirect back using JavaScript (no header here)
        echo "<script>
                alert('Passwords do not match. Please try again.');
                window.location.href = '../register.html';
              </script>";
        exit;
    }
}
?>