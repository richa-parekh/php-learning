<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();
if ($form->validate($email, $password)) {
    if ((new Authenticator)->attempt($email, $password)) {
        redirect('/');
    }

    $form->error('auth', "No matching account found for email address and password");
}



return view('/session/create', [
    'heading' => "Login",
    'errors' => $form->errors()
]);
