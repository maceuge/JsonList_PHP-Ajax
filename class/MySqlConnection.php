<?php


class MySqlConnection {

    private $connection;

    public function __construct() {

        try {
            $this->connection = new PDO('mysql:host=localhost;dbname=basede datos', 'usuario', 'contraseña');
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }


    public function getConnectionDB () {
        if ($this->connection instanceof PDO) {
            return $this->connection;
        } else {
            echo "No es una instancia de PDO ";
        }
    }


}