<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Http\Forms\RegistrationForm;

$errors = [];

$email = $_POST['email'];
$password = $_POST['password'];

$form = new RegistrationForm();

if (!$form->validate($email, $password)) {
    return view('/registration/create', [
        'heading' => "Register",
        'errors' => $form->errors()
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

    login([
        'email' => $email
    ]);

    header('location: /');
    exit;
}
