<?php
include("database.php");

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm-password"];

    if ($password !== $confirm_password) {
        header("Location: ../project.php?register_error=1");
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO login (username, password) VALUES (:username, :password)";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":username", $username);
        $stmt->bindValue(":password", $hashed_password);
        $stmt->execute();
        header("Location: ../project.php?register_success=1");
        exit();
    } catch (PDOException $e) {
        if ($e->errorInfo[1] == 1062) {
            header("Location: ../project.php?register_error=2");
        } else {
            header("Location: ../project.php?register_error=3");
        }
        exit();
    }
}
exit();
?>