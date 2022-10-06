<?php
    class ModeloGrupo{
        private $db;

        public function __construct(){
            $this->$db = new PDO('mysql:host=localhost;'.'dbname=db_catar;charset=utf8', 'root', '');
        }
    }