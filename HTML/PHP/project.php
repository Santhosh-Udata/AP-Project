<?php
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === "admin" && $password === "password") {
        // Redirect to a success page or show message here
        header("Location: ../intro.html"); // or any other result page
        exit;
    } else {
        // Show alert and redirect back using JavaScript (no header here)
        echo "<script>
                alert('Invalid username or password. Please try again.');
                window.location.href = '../login.html';
              </script>";
        exit;
    }
}
// If someone directly opens this PHP file
header("Location: ../login.html");
exit;
?>
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