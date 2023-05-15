<?php 

    session_start();

    function dd($var) {
    echo "<pre>";
    var_dump($var);
    echo "</pre>"; //afficher ligne par ligne (pre)

    die(); //arrete le traitement du php
    }   

    function connect () {
        $link = new PDO ('mysql:dbname=game;localhost', 'root', '');

        return $link;
    }