<?php
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm-password"];

    if ($password === $confirm_password) {
        echo "<script> alert('Registration successful!'); 
         window.location.href = '../login.html';</script>";
         exit;

    } else {
        echo "<script>
                alert('Passwords do not match. Please try again.');
                window.location.href = '../register.html';
              </script>";
        exit;
    }
}
?>