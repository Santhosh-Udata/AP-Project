<?php
session_start();

if (isset($_SESSION["username"])) {
    header("Location: profile.html");
} else {
    header("Location: login.html");
}
exit;
?>
