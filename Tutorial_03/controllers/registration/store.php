<?php

use Core\App;
use Core\Database;
use Core\Validator;

$errors = [];

$email = $_POST['email'];
$password = $_POST['password'];
if (!Validator::email($email)) {
    $errors['email'] = "Please enter valid email.";
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = "Please enter valid password.";
}

if (!empty($errors)) {
    return view('/registration/create', [
        'heading' => "Register",
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);
$user = $db->query("select * from users where email = :email", [
    'email' => $email
])->find();

if ($user) {
    header("location: /");
    exit;
} else {
    $db->query("INSERT INTO users (email, password) VALUES (:email, :password)", [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ]);

    $_SESSION['user'] = [
        'email' => $email
    ];

    header('location: /');
    exit;
}
