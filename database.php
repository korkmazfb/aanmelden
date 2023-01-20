<?php

function db_connect() : object {
    try{
        $pdo_connection = new PDO('sqlite:' . "web.db");

    } catch (PDOException $e) {
        echo 'connectie niet gelukt:' . $e->getMessage();
        exit();
    }
    return $pdo_connection;
}