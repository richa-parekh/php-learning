<?php
    $heading = "Create Note";
    $config = require "config.php";
    $db = new Database($config['database']);
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $db->query("INSERT INTO notes (user_id, note) VALUES (:user, :note)", [
            'user' => 1,
            'note' => $_POST["note"]
        ]);
    }
    
    require("views/note-create.view.php");