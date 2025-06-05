<?php
    $heading = "Notes";
    $config = require "config.php";
    $db = new Database($config['database']);

    $currentUserId = 1;
    $query = "SELECT * FROM notes WHERE user_id = :user";
    $notes = $db->query($query, ['user' => $currentUserId])->fetchAll();
    require("views/notes.view.php");