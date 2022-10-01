<?php

require "Modelo/Persona-model.php";

class PacienteModelo extends PersonaModelo
{
    private $idpaciente;
    private $idpersona;
    private $contacto;
    private $medicoCabecera;
    private $mutual;
    private $estado;


    public function __construct()
    {
        parent::__construct();

        $this->idpaciente = 0;
        $this->idpersona = 0;
        $this->contacto = "";
        $this->medicoCabecera = "";
        $this->mutual = "";
        $this->estado = "";   
    }

        /*------------------------
            Sets de paciente
        ------------------------*/

        public function setIdPaciente($idpaciente){                 $this->setIdPaciente = $idpaciente;}
        public function setIdPersona($idpersona){                   $this->idpersona = $idpersona;}
        public function setContacto($contacto){                     $this->contacto = $contacto;}
        public function setMedicoCabecera($medicoCabecera){         $this->medicoCabecera = $medicoCabecera;}
        public function setMutual($mutual){                         $this->mutual = $mutual;}
        public function setEstado($estado){                         $this->estado = $estado;} 

        /*------------------------
            Gets de paciente
        ------------------------*/

        public function getIdPaciente(){             return $this->idpaciente;}
        public function getIdPersona(){              return $this->idpersona;}
        public function getContacto(){               return $this->contacto;}
        public function getMedicoCabecera(){         return $this->medicoCabecera;}
        public function getMutual(){                 return $this->mutual;}
        public function getEstado(){                 return $this->estado;} 

        /*------------------------
            Insertar personas
        ------------------------*/

        public function insertar($persona,$paciente)
        {
            try
            {
                $stmt = $this->db->conexion()->prepare("CALL `insertar_pacientes`(?,?,?,?,?,?,?,?);");
                $stmt -> bindValue(1,$persona->getNombre());
                $stmt -> bindValue(2,$persona->getDni());
                $stmt -> bindValue(3,$persona->getCorreo());
                $stmt -> bindValue(4,$persona->getTelefono());
                $stmt -> bindValue(5,$persona->getPassword());
                $stmt -> bindValue(6,$paciente->getContacto());
                $stmt -> bindValue(7,$paciente->getMedicoCabecera());
                $stmt -> bindValue(8,$paciente->getMutual());

                if($stmt->execute())
                {
                    return true;
                }

                $this->Redi;
            }
            catch(PDOException $e)
            {
                error_log("Paciente::insertar->PDOException ".$e);
                return false;
            }

            $stmt->close();
            $stmt=null;
        }

        /*------------------------
            Seleccionar pacientes
        ------------------------*/

        public function seleccionar()
        {
            try
            {
                $stmt = $this->db->Conexion()->prepare("select IdPaciente,Nombre,Dni,Correo,Telefono,Contacto,Medico_Cabecera,Mutual,Estado
                from persona
                join paciente on persona.IdPersona = paciente.IdPersona");
                $stmt -> execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            catch(Exception $e)
            {
                error_log("Model::seleccionar->PDOException ".$e);
                return false;
            }
            $stmt -> close();
            $stmt = null;
        }

        /*------------------------
            Actulalizar personas
        ------------------------*/
    
        public function actualizar($dato)
        {
            $stmt = $this->db->conexion()->prepare("
                UPDATE persona
                JOIN paciente ON persona.IdPersona =:id AND paciente.IdPersona =:id
                SET persona.nombre=:nombre ,persona.correo=:correo,persona.telefono=:telefono,persona.password =:pass,
                    paciente.contacto =:contacto,paciente.Medico_Cabecera=:medico_Cabecera,paciente.mutual=:mutual;");
            $stmt -> bindParam(":id",$dato["idpersona"],PDO::PARAM_STR);
            $stmt -> bindParam(":nombre",$dato["nombre"],PDO::PARAM_STR);
            $stmt -> bindParam(":correo",$dato["correo"],PDO::PARAM_STR);
            $stmt -> bindParam(":telefono",$dato["telefono"],PDO::PARAM_STR);
            $stmt -> bindParam(":pass",$dato["pass"],PDO::PARAM_STR);
            $stmt -> bindParam(":contacto",$dato["contacto"],PDO::PARAM_STR);
            $stmt -> bindParam(":medico_Cabecera",$dato["medico_Cabecera"],PDO::PARAM_STR);
            $stmt -> bindParam(":mutual",$dato["mutual"],PDO::PARAM_STR);
            
            if($stmt->execute())
            {
                return true;
            }
            else
            {
                error_log("Paciente::actualizar->PDOException ");
                return false;
            }

        $stmt->close();
        $stmt=null;
        }

        /*------------------------
            Cargar un paciente
        ------------------------*/

        public function from($array)
        {
            $this->idpaciente = $array["IdPaciente"];
            $this->idpersona = $array["IdPersona"];
            $this->contacto = $array["Contacto"];
            $this->medicoCabecera = $array["Medico_Cabecera"];
            $this->mutual = $array["Mutual"];
            $this->estado = $array["Estado"];
        }

        /*------------------------
            Mostrar un paciente
        ------------------------*/

        public function mostrarDatos($id)
        {
            error_log("id:".$id);
            $stmt = $this->db->Conexion()->prepare("
                SELECT paciente.IdPersona as id,nombre,dni,correo,telefono,password,Contacto,Medico_Cabecera,Mutual
                FROM paciente
                JOIN persona ON (persona.IdPersona = :valor1) AND (paciente.IdPersona = :valor2)");
            $stmt -> bindParam(":valor1",$id,PDO::PARAM_STR);
            $stmt -> bindParam(":valor2",$id,PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt->fetch(PDO::FETCH_ASSOC); 
        }
}

?>