<?php

use Core\Session;

view("session/create", [
    'heading' => "Login",
    'errors' => Session::get('errors')
]);