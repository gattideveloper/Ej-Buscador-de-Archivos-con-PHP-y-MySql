<?php
    class Get_Model{
        private $conexion;
        function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conect();
        }
        //==== F U N C T I O N  ====//
        public function Get_Pacientes($data1){
            $consult = $this->conexion->query("CALL SP_Get_Pacientes('$data1')"); 
            //CREATE PROCEDURE SP_Get_Pacientes(data1 varchar(150))
            //SELECT * FROM `patient` WHERE `surname` LIKE data1
            return $consult;
        }

        public function Get_studiesPatient($data1){
            $consult = $this->conexion->query("CALL SP_Get_studiesPatient('$data1')"); 
            //CREATE PROCEDURE SP_Get_studiesPatient(data1 int)
            //SELECT DISTINCT(`id_patient`) FROM `studies` WHERE `id_patient` = data1
            return $consult;
        }
        
      
    }
?>