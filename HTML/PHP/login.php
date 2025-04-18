<?php

session_start();

include ("database.php");

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
                exit;
            } else {
                echo "<script>
                        alert('Invalid username or password. Please try again.');
                        window.location.href = '../login.html';
                      </script>";
                exit;
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }
}
header("Location: ../login.html");
exit;
?>