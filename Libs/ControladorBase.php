<?php
    class ControladorBase
    {
        public function __construct()
        {
            $this->View = new View();
        }

        public function CargarModelo($model)
        {
            $url = "Modelo/".$model."-model.php";

            if(file_exists($url))
            {
                require_once $url;

                $modelName = $model."Modelo";
                $this->model =new $modelName;
            }
        }

        function existPOST($params)
        {
            foreach($params as $param)
            {
                if(!isset($_POST[$param]))
                {
                    error_log('CONTROLADORBASE::existPost => no existe el parametro ' . $param);
                    return false;
                }
            }
        }

        function existGET($params)
        {
            foreach($params as $param)
            {
                if(!isset($_GET[$param]))
                {
                    return false;
                }
            }
        }

        function Redirect($ruta)
        {
            header('Location: '. constant('url').$ruta);
            error_log('Location: '. constant('url').$ruta);
        }


    }
?>