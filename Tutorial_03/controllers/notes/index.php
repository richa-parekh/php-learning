<?php
    use Core\Database;
    $config = require base_path("config.php");
    $db = new Database($config['database']);

    $currentUserId = 1;
    $query = "SELECT * FROM notes WHERE user_id = :user";
    $notes = $db->query($query, ['user' => $currentUserId])->get();

    view("notes/index", [
        'heading' => "Notes",
        'notes' => $notes
    ]);