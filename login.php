<?php
session_start();
include 'config.php';

if (isset($_SESSION['user_id']) || isset($_COOKIE['remember_me'])) {
    header("Location: dashboard.php");
    exit();
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        
        if (!empty($_POST['remember'])) {
            setcookie('remember_me', $user['id'], time() + (86400 * 30), "/");
        }
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid email or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Login</h2>
        <form method="POST">
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <input type="checkbox" name="remember"> Remember Me
            </div>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
</form>
        <div class="mt-3 text-center">
            <p>Don't have an account? <a href="registration.php" class="btn btn-link">Register here</a></p>
        </div>
    </div>
</body>
</html>
