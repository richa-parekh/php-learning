<?php
    $popular_languages = [
        [
            'name' => 'PHP',
            'releaseYear' => 1995,
            'creator' => 'Rasmus Lerdorf',
            'url' => 'www.php.com'
        ],
        [
            'name' => 'Python',
            'releaseYear' => 1991,
            'creator' => 'Guido van Rossum',
            'url' => 'www.python.com'
        ],
        [
            'name' => 'JavaScript',
            'releaseYear' => 1995,
            'creator' => 'Brendan Eich',
            'url' => 'www.js.com'
        ]
    ];

    function filter($items, $fn){
        $filteredItems = [];
        
        foreach($items as $item){ 
            if($fn($item)){
                $filteredItems[] = $item;
            }
        }
        return $filteredItems;
    }

    /* $filteredItems = filter($popular_languages, function ($book){
        return $book['releaseYear'] >= 1990;
    }); */

    /* Using PHP array function */
    $filteredItems = array_filter($popular_languages, function ($book){
        return $book['releaseYear'] <= 1995;
    });

    require('index.view.php');