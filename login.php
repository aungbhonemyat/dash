<?php

session_start();

$_email = $_POST['email'];
$_password = $_POST['password'];

if ($_email === 'admin@gmail.com' and $_password === '1234') {
    $_SESSION['user'] = ['username' => 'admin'];
    header('location: dashboard.php');
} else {
    header('location: index.php?incorrect=true');
}
