<?php

include("database.php");

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm-password"];

    if ($password === $confirm_password) {

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO login (username, password) VALUES (:username, :password)";
        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(":username", $username);
            $stmt->bindValue(":password", $hashed_password);
            $stmt->execute();
            echo "<script> alert('Registration successful!'); 
             window.location.href = '../login.html';</script>";
            exit;
        } catch (PDOException $e) {
            echo "Registration Failed: " . $e->getMessage();

        }


    } else {
        echo "<script>
                alert('Passwords do not match. Please try again.');
                window.location.href = '../register.html';
              </script>";
        exit;
    }
}
?>