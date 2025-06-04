<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Learning</title>
    <style>
        /* body{
            margin: 0;
            display: grid;
            place-items: center;
            height: 100vh;
            font-family: sans-serif;
        } */
    </style>
</head>
<body>
    <h1>Popular Languages</h1>
    <ul>
        <?php foreach($filteredItems as $item): ?>
            <li>
                <a href="<?= $item['url'] ?>">
                    <?= $item['name'] ?> (<?= $item['releaseYear'] ?>)
                </a>
            </li>
        <?php endforeach ?>
    </ul>
</body>
</html>