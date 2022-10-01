<?php
    class App
    {
        public function __construct()
        {
            $url = isset($_GET["url"]) ? $_GET["url"]:null;
            $url = rtrim($url,"/");
            $url = explode("/",$url);
            $archivoControlador = "Controlador/".$url[0].".php";

            if(file_exists($archivoControlador))
            {
                require_once $archivoControlador;
                $controlador = new $url[0];
                $controlador->CargarModelo("Paciente"); 
                $controlador->CargarVista();
                

                if(isset($url[1]))
                {
                    if(method_exists($controlador,$url[1]))
                    {
                        if(isset($url[2]))
                        {
                            $nparam = count($url)-2;
                            $param = [];

                            for($i= 0;$i < $nparam;$i++)
                            {
                                array_push($params,($url[$i]+2) );
                            }
                            $controlador->{$url[1]}($params);
                        }
                        else
                        {
                            $controlador->{$url[1]}();//llama al metodo sin parametros
                        }
                    }
                    
                }
                else
                {
                    $controlador->CargarVista();
                }
            }
            else
            {
                require_once "Controlador/Inicio.php";
                $controlador = new Inicio();
                $controlador->CargarVista();
                $controlador->CargarModelo("Inicio");
            }  
        }
    }
?>