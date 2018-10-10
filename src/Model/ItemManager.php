<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 01/10/18
 * Time: 16:30
 */

namespace Model;
require __DIR__ . '/../../app/db.php';
// src/Model/ItemManager.php


    class ItemManager{


       // private $datatable = "items";

// récupération de tous les items
        public function selectAllItems(): array
        {
            $pdo = new \PDO(DSN, USER, PASS);
            $query = "SELECT * FROM item";
            $res = $pdo->query($query);

            return $res->fetchAll();
        }

    public function selectOneItem(int $id) : array
    {
        $pdo = new \PDO(DSN, USER, PASS);
        $query = "SELECT * FROM item WHERE id = :id";
        $statement = $pdo->prepare($query);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();
        // contrairement à fetchAll(), fetch() ne renvoie qu'un seul résultat
        return $statement->fetch();
    }

    }

    ?>
