<?php
session_start();
if (!isset($_SESSION['user_id']) && !isset($_COOKIE['remember_me'])) {
    header("Location: login.php");
    exit();
}
$user_name = $_SESSION['user_name'] ?? "User";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Welcome, <?php echo $user_name; ?>!</h2>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</body>
</html>