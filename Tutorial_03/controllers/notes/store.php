<?php

use Core\Validator;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$errors = [];

if (!Validator::string($_POST['note'], 1, 250)) {
    $errors['note'] = "Note must be less then 250 character.";
}

if (!empty($errors)) {
    view("notes/create", [
        'heading' => "Create Note",
        'errors' => $errors
    ]);
}

$db->query("INSERT INTO notes (user_id, note) VALUES (:user_id, :note)", [
    'user_id' => 1,
    'note' => $_POST["note"]
]);

header('location: /notes');
exit;
