<?php

class PersonaModelo extends Model
{
    private $idpersona;
    private $Nombre;
    private $Dni;
    private $Correo;
    private $Telefono;
    private $Password;
    private $Rol;



    public function __construct()
    {
        parent::__construct();

        $this->idpersona = 0;
        $this->Nombre = "";
        $this->Dni = "";
        $this->Correo = "";
        $this->Telefono = "";
        $this->Password = "";
        $this->Rol = "";   
    }

        /*------------------------
            Sets de paciente
        ------------------------*/

        public function setIdPersona($idpersona){                   $this->idpersona = $idpersona;}
        public function setNombre($Nombre){                         $this->Nombre = $Nombre;}
        public function setDni($Dni){                               $this->Dni = $Dni;}
        public function setCorreo($Correo){                         $this->Correo = $Correo;}
        public function setTelefono($Telefono){                     $this->Telefono = $Telefono;} 
        public function setPassword($Password){                     $this->Password = $Password;} 
        public function setRol($Rol){                               $this->Rol = $Rol;} 

        /*------------------------
            Gets de paciente
        ------------------------*/

        public function getIdPersona(){                             return $this->idpersona;}
        public function getNombre(){                                return $this->Nombre;}
        public function getDni(){                                   return $this->Dni;}
        public function getCorreo(){                                return $this->Correo;}
        public function getTelefono(){                              return $this->Telefono;} 
        public function getPassword(){                              return $this->Password;} 
        public function getRol(){                                   return $this->Rol;}
}

?>