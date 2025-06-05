<?php
    $heading = "Notes";
    $config = require "config.php";
    $db = new Database($config['database']);

    $currentUserId = 1;
    $query = "SELECT * FROM notes WHERE id = :id";
    $note = $db->query($query,['id' => $_GET['id']])->fetch();
    if(!$note){
        abort();
    }
    if($note['user_id'] !== $currentUserId){
        abort(Responses::FORBIDDEN);
    }
    require("views/note.view.php");