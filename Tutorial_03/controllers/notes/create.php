<?php
    require "Validator.php";
    $heading = "Create Note";
    $config = require "config.php";
    $db = new Database($config['database']);
   
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $errors = [];

        if(!Validator::string($_POST['note'], 1, 250)){
            $errors['note'] = "Note must be less then 250 character.";
        }
        
        if(empty($errors)){
            $db->query("INSERT INTO notes (user_id, note) VALUES (:user_id, :note)", [
                'user_id' => 1,
                'note' => $_POST["note"]
            ]);
        }
        
    }
    
    require("views/notes/create.view.php");