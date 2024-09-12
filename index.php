<?PHP 
  include ('setting/database.php');
  require_once "models/main_model.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/styles.css" />
    <title>Document</title>
  </head>
  <body>
  <div class="BoxMenu">
    <h1>BUSCAR PRODUCTOS</h1>

    <form action="" method="get">
      <input type="text" name="busqueda"></input><br>
      <input type="submit" name="enviar" value="Buscar"></input>
    </form>
    
    <br>
    <br>
    <br>

    <?php 
      if(isset($_GET['enviar'])){
        
        $busqueda = $_GET["busqueda"];

        $obj_get = new Get_Model();
	      $data_patient = $obj_get->Get_Pacientes($busqueda);
     
        while ($date_patient = mysqli_fetch_assoc($data_patient)) { 
          $id = $date_patient['id']; 
          $name = $date_patient['name']; 
          $surname = $date_patient['surname']; 
          $dni = $date_patient['dni']; 
          
          $Studios_Model = new Get_Model();
          $get_patient = $Studios_Model-> Get_studiesPatient($id);
        
          while($studiesPatient = mysqli_fetch_assoc($get_patient)){ 

            $id_paciente = $studiesPatient['id_patient'];

           /*echo "Nombre de la Pasiente: " . $get_patient['name'] . " " . $get_patient['surname'];*/?>
            <div class="menu">
              <h6><?php echo $name .' ' . $surname;?></h6>
              <p><?php echo $dni;?></p>
              <a href="planilla.php?p=<?php echo $id_paciente;?>">Ver</a>
            </div>
          <?php }
        }
      }
    ?>

   
   
    
</div>
  </body>
</html>