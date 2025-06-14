<?php

use Core\Validator;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$errors = [];
$currentUserId = 1;

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    'id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

if (!Validator::string($_POST['note'], 1, 250)) {
    $errors['note'] = "Note must be less then 250 character.";
}

if (!empty($errors)) {
    view("notes/edit", [
        'heading' => "Edit Note",
        'errors' => $errors,
        'note' => $note
    ]);
}

$db->query("UPDATE notes SET note = :note WHERE id = :id", [
    'id' => $_POST["id"],
    'note' => $_POST["note"]
]);

header('location: /notes');
exit;
