<?php

    use Core\Responses;
    function dd($value){
        echo "<pre>";
        var_dump($value);
        echo "</pre>";
        die();
    }

    function urlIs($value)  {
        return $_SERVER['REQUEST_URI'] === $value;
    }

    function authorize($condition, $status = Responses::FORBIDDEN){
        if(!$condition){
            abort($status);
        }
    }

    function base_path($path){
        return BASE_PATH . $path;
    }

    function view($path, $attributes = []){
        extract($attributes);
        require base_path('views/'. $path . ".view.php");
    }

    function abort($code = 404)
    {
        http_response_code($code);
        require base_path("views/{$code}.php");
        die();
    }