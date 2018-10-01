<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 01/10/18
 * Time: 16:31
 */
?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Simple MVC</title>

    <link rel="stylesheet" href="/assets/css/styles.css">
    </head>
<body>
    <section>
        <h1>Items</h1>
            <ul>
            <?php foreach ($items as $item) : ?>
                <li><?= $item['title'] ?></li>
            <?php endforeach ?>
            </ul>
        </section>
</body>
</html>

