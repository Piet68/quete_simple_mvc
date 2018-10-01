<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 01/10/18
 * Time: 16:29
 */

// src/Controller/ItemController.php
require __DIR__ . '/../Model/ItemManager.php';

$items = selectAllItems();

require __DIR__ . '/../View/item.php';
?>