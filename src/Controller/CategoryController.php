<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 10/10/18
 * Time: 14:18
 */

namespace Controller;

use Model;
use Model\CategoryManager;

use Twig_Loader_Filesystem;
use Twig_Environment;

class CategoryController extends AbstractController {



    public function index(){
        $categoryManager = new CategoryManager($this->pdo);
        $categories = $categoryManager->selectAll();

        return $this->twig->render('category.html.twig', ['categories' => $categories]);

    }

    public function show(int $id)
    {
        $categoryManager = new CategoryManager($this->pdo);
        $category = $categoryManager->selectOneById($id);

        return $this->twig->render('showcategory.html.twig', ['category' => $category]);

    }

    public function add()
    {
        if (!empty($_POST)) {
            // TODO : validations des valeurs saisies dans le form
            // création d'un nouvel objet Item et hydratation avec les données du formulaire
            $category = new Model\Category();
            $category->setName($_POST['name']);

            $categoryManager = new CategoryManager($this->pdo);
            // l'objet $item hydraté est simplement envoyé en paramètre de insert()
            $categoryManager->insert($category);
            // si tout se passe bien, redirection
            header('Location: /categories');
            exit();
        }
        // le formulaire HTML est affiché (vue à créer)
        return $this->twig->render('addCategory.html.twig');
    }
}


?>