<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 1;
$query = "SELECT * FROM notes WHERE user_id = :user";
$notes = $db->query($query, ['user' => $currentUserId])->get();

view("notes/index", [
    'heading' => "Notes",
    'notes' => $notes
]);
