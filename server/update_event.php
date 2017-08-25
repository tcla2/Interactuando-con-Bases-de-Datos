<?php

  include('conector.php');
  
 
  $data['start_date'] = $_POST['start_date'];
  $data['end_date'] = $_POST['end_date'];
  $data['end_hour'] = $_POST['end_hour'];
  $data['start_hour'] = $_POST['start_hour'];
   
  $cod = $_POST['id'];
 

  $con = new ConectorBD('localhost','root','12629752');
  $response['conexion'] = $con->initConexion('agenda');

  if ($response['conexion']=='OK') {
    if( $con->actualizarRegistro('evento', $data , ' Id="'.$cod.'"' )){
		  $response['msg']="OK";
    }else {
      $response['msg']= "Hubo un error y los datos no han sido cargados";
    }
  }else {
    $response['msg']= "No se pudo conectar a la base de datos";
  }

  echo json_encode($response);


 ?>