<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 01/10/18
 * Time: 16:29
 */

namespace Controller;

use Model;

class ItemController{
    public function index(){

    }
}

$itemManager = new Model\ItemManager();

$items = $itemManager->selectAllItems();

require __DIR__ . '/../View/item.php';
?>