<?php

    class Inicio extends ControladorBase
    {
        public function __construct()
        {
            parent::__construct();

        }
        
        public function CargarVista()
        {
            $this->View->render("Inicio");
        }

        
    }