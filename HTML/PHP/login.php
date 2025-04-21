<?php
session_start();
include("database.php");

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    try {
        $sql = "SELECT * FROM login WHERE username = :username";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':username', $username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            if (password_verify($password, $result['password'])) {
                $_SESSION["username"] = $username;
                header("Location: ../project.php?username=" . urlencode($username));
                exit();
            } else {
                header("Location: ../project.php?login_error=1");
                exit();
            }
        } else {
            header("Location: ../project.php?login_error=1");
            exit();
        }
    } catch (PDOException $e) {
        header("Location: ../project.php?login_error=2");
        exit();
    }
}
exit();
?>