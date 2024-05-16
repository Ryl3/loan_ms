<?php
session_start();
include_once 'Database.php';
include_once 'User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if ($_POST) {
    $user->username = $_POST['username'];
    $user->password = $_POST['password'];

    if ($user->authenticate()) {
        $_SESSION['user_id'] = $user->id;
        header("Location: welcome.php");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Invalid username or password.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .centered-submit {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .form-header {
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>
    <section class="container-fluid mt-4">
        <header class="form-header mb-4">
            <h1>Login Form</h1>
            <?php if (isset($_GET['registration']) && $_GET['registration'] == 'success'): ?>
                <div class="alert alert-success">Registration successful. Please log in.</div>
            <?php endif; ?>
        </header>
        <form action="login.php" method="post" class="form row justify-content-center">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Enter username" required />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter password" required />
                </div>
                <div class="col-12 centered-submit">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <div class="centered-submit">
                    <p>Don't have an account? <a href="register.php">Register</a></p>
                </div>
            </div>
        </form>
    </section>
</body>
</html>
