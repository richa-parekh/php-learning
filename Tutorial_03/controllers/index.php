<?php
    $_SESSION["name"] = "Richa";
    $_SESSION["login"] = "true";
    view("index", [
        'heading' => "Dashboard"
    ]);