<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 01/10/18
 * Time: 16:29
 */

namespace Controller;

use Model\ItemManager;
use Model;

use Twig_Loader_Filesystem;
use Twig_Environment;

class ItemController extends AbstractController {



    public function index(){
        $itemManager = new ItemManager($this->pdo);
        $items = $itemManager->selectAll();

        return $this->twig->render('item.html.twig', ['items' => $items]);
        //require __DIR__ . '/../View/item.html.twig';
    }

    public function show(int $id)
    {
        $itemManager = new ItemManager($this->pdo);
        $item = $itemManager->selectOneById($id);
        return $this->twig->render('showitem.html.twig', ['item' => $item]);


    }

    public function add()
    {
        if (!empty($_POST)) {
            // TODO : validations des valeurs saisies dans le form
            // création d'un nouvel objet Item et hydratation avec les données du formulaire
            $item = new Model\Item();
            $item->setTitle($_POST['title']);

            $itemManager = new ItemManager($this->pdo);
            // l'objet $item hydraté est simplement envoyé en paramètre de insert()
            $itemManager->insert($item);
            // si tout se passe bien, redirection
            header('Location: /');
            exit();
        }
        // le formulaire HTML est affiché (vue à créer)
        return $this->twig->render('add.html.twig');
    }

    public function edit($id){

        $itemManager = new ItemManager($this->pdo);
        $item = $itemManager->selectOneById($id);

        if (!empty($_POST)){
            $item->setTitle($_POST['title']);
            $itemManager->update($item);
            header('Location: /');
            exit();
        }

        return $this->twig->render('edit.html.twig', ['item' => $item]);
    }

    public function delete($id){

        $itemManager = new ItemManager($this->pdo);
        $item = $itemManager->selectOneById($id);

        if (!empty($_POST)){
            $item->setTitle($_POST['title']);
            $itemManager->delete($item);
            header('Location: /');
            exit();
        }

        return $this->twig->render('delete.html.twig', ['item' => $item]);
    }
}



?>