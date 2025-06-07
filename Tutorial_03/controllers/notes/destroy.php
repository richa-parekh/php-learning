<?php

use Core\Database;

$config = require base_path("config.php");
$db = new Database($config['database']);

$currentUserId = 1;

$note = $db->query("SELECT id, user_id FROM notes WHERE id = :id", [
    'id' => $_POST['note_id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query("DELETE FROM notes where id = :id", [
    'id' => $_POST['note_id']
]);

header('location: /notes');
exit;
