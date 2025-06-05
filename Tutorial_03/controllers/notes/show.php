<?php
    $heading = "Notes";
    $config = require "config.php";
    $db = new Database($config['database']);

    $currentUserId = 1;
    $query = "SELECT * FROM notes WHERE id = :id";
    $note = $db->query($query,['id' => $_GET['id']])->findOrFail();
    
    authorize($note['user_id'] === $currentUserId);
    
    require("views/notes/show.view.php");