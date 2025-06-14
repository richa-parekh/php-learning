<?php

use Core\App;
use Core\Database;
use Core\Validator;

$errors = [];

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];
if (!Validator::email($email)) {
    $errors['email'] = "Please enter valid email.";
}

if (!Validator::string($password)) {
    $errors['password'] = "Please enter valid password.";
}

if (!empty($errors)) {
    return view('/session/create', [
        'heading' => "Login",
        'errors' => $errors
    ]);
}


$user = $db->query("SELECT * FROM users WHERE email = :email", [
    'email' => $email
])->find();
if ($user) {
    if (password_verify($password, $user['password'])) {
        login($user);
        header("location: /");
        exit;
    }
}
return view('/session/create', [
    'heading' => "Login",
    'errors' => [
        'email' => "No matching account found for email address and password"
    ]
]);
