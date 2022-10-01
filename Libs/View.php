<?php
    class View
    {
        public function __construct()
        {

        }

        public function render($vista,$data=[])
        {
            $this->dato = $data;
            require_once "Vista/".$vista."-view.php";
        }
    }
?>