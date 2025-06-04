<?php
    $heading = "Notes";
    $config = require "config.php";
    $db = new Database($config['database']);
    $query = "SELECT * FROM notes WHERE id = :id";
    $note = $db->query($query,['id' => $_GET['id']])->fetch();
    require("views/note.view.php");