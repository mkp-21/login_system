<?php
session_start();


if (isset($_SESSION['user_id']) || isset($_COOKIE['remember_me'])) {
    
    header("Location: dashboard.php");
    exit();
} else {
    
    header("Location: login.php");
    exit();
}
?>
