<?php

namespace App\DAO;

use \PDO;


class MySQL extends PDO {
    
    private $host = "localhost";
    private $usuario = "root";
    private $senha = "34856742x";
    private $db = "sisgen";

    private $opcoes = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);


    public function __construct()
    {
        // Data source name
        $dsn = "mysql:host=" . $this->host .";dbname=" . $this->db;

        //Php Data Object
        return parent::__construct($dsn, $this->usuario, $this->senha, $this->opcoes);
        
    }

}