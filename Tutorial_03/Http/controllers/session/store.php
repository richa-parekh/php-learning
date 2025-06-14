<?php

use Core\App;
use Core\Database;
use Http\Forms\LoginForm;

$errors = [];

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();
if (!$form->validate($email, $password)) {
    return view('/session/create', [
        'heading' => "Login",
        'errors' => $form->errors()
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
        'auth' => "No matching account found for email address and password"
    ]
]);
