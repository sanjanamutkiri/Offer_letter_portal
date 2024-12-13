<?php
session_start();
include('includes/db_connect.php');

// Handle Login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $username;
            header("Location: dashboard.php");
            exit();
        } else {
            $login_error = "Invalid username or password.";
        }
    } else {
        $login_error = "Invalid username or password.";
    }
}

// Handle Registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['reg_username']);
    $password = mysqli_real_escape_string($conn, $_POST['reg_password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
    if (mysqli_query($conn, $query)) {
        $register_success = "User registered successfully! You can now log in.";
    } else {
        $register_error = "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offer Letter Portal - Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="login-container">
        <h2>Login to Offer Letter Portal</h2>
        <form action="dashboard.php" method="POST">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit" name="login">Login</button>
        </form>
        <?php if (isset($login_error)) echo "<p style='color:red;'>$login_error</p>"; ?>
    </div>

    <div class="register-container">
        <h2>Register a New User</h2>
        <form action="dashboard.php" method="POST">
            <input type="text" name="reg_username" placeholder="Username" required><br>
            <input type="password" name="reg_password" placeholder="Password" required><br>
            <button type="submit" name="register">Register</button>
        </form>
        <?php if (isset($register_success)) echo "<p style='color:green;'>$register_success</p>"; ?>
        <?php if (isset($register_error)) echo "<p style='color:red;'>$register_error</p>"; ?>
    </div>
</body>
</html>
