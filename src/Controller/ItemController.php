<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 01/10/18
 * Time: 16:29
 */

namespace Controller;

use Model\ItemManager;

use Twig_Loader_Filesystem;
use Twig_Environment;

class ItemController{

    private $twig;

    public function __construct()
    {
        $loader = new Twig_Loader_Filesystem(__DIR__.'/../View');
        $this->twig = new Twig_Environment($loader);
    }

    public function index(){
        $itemManager = new ItemManager();
        $items = $itemManager->selectAllItems();

        return $this->twig->render('item.html.twig', ['items' => $items]);
        //require __DIR__ . '/../View/item.html.twig';
    }

    public function show(int $id)
    {
        $itemManager = new ItemManager();
        $item = $itemManager->selectOneItem($id);
        return $this->twig->render('showitem.html.twig', ['item' => $item]);


    }
}



?>