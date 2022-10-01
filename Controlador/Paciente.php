<?php
    
    require_once "Modelo/Paciente-model.php";

    class Paciente extends ControladorBase
    {
        private $paciente;

        public function __construct()
        {
            parent::__construct();
            $p = new PacienteModelo();
            $this->setPaciente($p->seleccionar());
        }
        
        public function setPaciente($paciente)
        {

            $this->paciente = $paciente;
        }

        public function getPaciente()
        {
            return $this->paciente;
        }

        public function Insertar()
        {
            // $persona = new PersonaModelo();
            // $paciente = new PacienteModelo();

            // $persona->setNombre($_POST["registrarNombre"]);
            // $persona->setDni($_POST["registrarDni"]);
            // $persona->setCorreo($_POST["registrarEmail"]);
            // $persona->setTelefono($_POST["registrarTelefono"]);
            // $persona->setPassword($_POST["registrarPassword"]);
            // $paciente->setContacto($_POST["registrarContacto"]);
            // $paciente->setMedicoCabecera($_POST["registrarMedicoCabecera"]);
            // $paciente->setMutual($_POST["registrarMutual"]);

            // $paciente->insertar($persona,$paciente); 
            
            $this->Redirect("Paciente");
            error_log('Ingreso a Insertar');
        }

        public function CargarVista()
        {
            $this->View->render("Paciente",$this->getPaciente());
        }

        
    }
?>