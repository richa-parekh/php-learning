<?php
    $heading = "Create Note";
    $config = require "config.php";
    $db = new Database($config['database']);
    
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $errors = [];

        if(strlen($_POST['note']) === 0){
            $errors['note'] = "Note is required.";
        }
        if(strlen($_POST['note']) > 250){
            $errors['note'] = "Note should be 250 character long.";
        }

        if(empty($errors)){
            $db->query("INSERT INTO notes (user_id, note) VALUES (:user_id, :note)", [
                'user_id' => 1,
                'note' => $_POST["note"]
            ]);
        }
        
    }
    
    require("views/note-create.view.php");