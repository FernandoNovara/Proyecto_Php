<?php

    class Conexion
    {
        private $host;
        private $database;
        private $user;
        private $pass;
        private $Charset;

        public function __construct()
        {
            $this->host = constant("Host");
            $this->database = constant("Database");
            $this->user = constant("User");
            $this->pass = constant("Pass");
            $this->charset = constant("Charset");
        }

        public function Conexion()
        {
            try
            {
                
                $link = new PDO("mysql:host=".$this->host.";dbname=".$this->database,$this->user,$this->pass);
                $link -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $link -> exec("set names ".$this->charset);
                return $link;
            }
            catch(PDOException $e)
            {
                die ("Connection failed: " . $e->getMessage());
                echo "Linea del error" . $e->getLine();
            }

        }
    }

?>