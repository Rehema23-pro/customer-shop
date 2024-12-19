<?php
session_start();

// Dummy data for demonstration purposes
// Replace this with your actual database connection and query
$adminCredentials = [
    'username' => 'grace', // Replace with your actual admin username
    'password' => 'Rehema@21', // Replace with your hashed admin password
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Example login validation
    if ($username === $adminCredentials['username'] && $password === $adminCredentials['password']) {
        $_SESSION['admin_logged_in'] = true; // Set session variable to indicate admin is logged in
        header('Location: admin_dashboard.php'); // Redirect to admin dashboard
        exit;
    } else {
        $error = 'Invalid username or password.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <div class="container">
        <h2>Admin Login</h2>
        <form action="admin_login.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <?php if (isset($error)): ?>
                <span class="error"><?= htmlspecialchars($error); ?></span>
            <?php endif; ?>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
