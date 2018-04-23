<?php
include __DIR__ . "/../bootstrap/autoload.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PC WORLD</title>
    <link href="/public/css/main.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script src="/public/js/jquery-3.2.1.min.js"></script>
    <script src="/public/js/script.js"></script>
</head>
<body>
<div id="header">
    <div class="header-content">
        <div class="header-top">
            <div class="brand-name"><a href="/">PC WORLD</a></div>
            <div class="navbar">
                <ul>
                    <li class="active" data-item="1"><a href="/">Home</a></li>
                    <li><a href="#">About</a></li>

                    <?php if(!checkLogin()) : ?>
                        <li><a href="/login.php">Login</a></li>
                        <li><a href="/register.php">Register</a></li>
                    <?php else : ?>
                        <?php if(checkAdmin()) : ?>
                            <li><a href="/admin">Admin</a></li>
                        <?php endif; ?>
                        <li><a href="/user-panel.php">Panel</a></li>
                        <li><a href="/logout.php">Logout</a></li>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
        <div class="header-bottom">
            <h1>Weblog</h1>
            <p>See Future through our eyes...</p>
        </div>
    </div>
</div>