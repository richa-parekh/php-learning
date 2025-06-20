<?php

use Core\Session;
use Core\Authenticator;
use Core\ValidationException;
use Http\Forms\LoginForm;

$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

$signedIn = (new Authenticator)->attempt($attributes['email'], $attributes['password']);
if ($signedIn) {
   $form->error('auth', "No matching account found for email address and password")->throw();
}

return redirect('/login');