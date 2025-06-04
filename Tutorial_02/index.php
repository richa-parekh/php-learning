<?php
    require "functions.php";

    //require "router.php";

    require "Database.php";
    $config = require "config.php";
    
    $db = new Database($config['database']);
    $id = $_GET['id'];
    $query = "SELECT * FROM post WHERE id = :id";
    $posts = $db->query($query, ['id' => $id])->fetchAll();
    dd($posts);
    foreach($posts as $post){
        echo "<li>".$post['title']."</li>";
    }