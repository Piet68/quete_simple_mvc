<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 10/10/18
 * Time: 14:25
 */
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
<main>
    <h1>Category <?= @$category['title'] ?></h1>
    <ul>
        <li>Id : <?= $category['id'] ?></li>
    </ul>
    <a href='/category'>Back to list</a>
</main>
</body>
</html>
