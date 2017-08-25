<?php

  include('conector.php');
  session_start();

  $data['titulo'] = "'".$_POST['titulo']."'";
  $data['start_date'] = "'".$_POST['start_date']."'";
  $data['allDay'] = "'".$_POST['allDay']."'";
  $data['end_date'] = "'".$_POST['end_date']."'";
  $data['end_hour'] = "'".$_POST['end_hour']."'";
  $data['start_hour'] = "'".$_POST['start_hour']."'";
  $data['cod_usuario'] = "'".$_SESSION['session_id_user'] ."'";
 
 

  $con = new ConectorBD('localhost','root','12629752');
  $response['conexion'] = $con->initConexion('agenda');

  if ($response['conexion']=='OK') {
    if($con->insertData('evento', $data)){
		  $response['msg']="OK";
    }else {
      $response['msg']= "Hubo un error y los datos no han sido cargados";
    }
  }else {
    $response['msg']= "No se pudo conectar a la base de datos";
  }

  echo json_encode($response);


 ?>