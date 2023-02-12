<?php

    function getDatabase() {
        $bdd = null;
        $url = "mysql:host=localhost;dbname=tp_sql;charset=utf8";
        $login = "root";
        $password = "";

        try {
            $bdd = new PDO($url, $login, $password);
        }
        catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        return $bdd;
    }
