<?php

  require('./conector.php');
session_start();


  $con = new ConectorBD('localhost','root','12629752');

  $response['conexion'] = $con->initConexion('agenda');

  if ($response['conexion']=='OK') {
    $resultado_consulta = $con->consultar(['usuarios'],['usuario','password','Id','nombre_completo'], 'WHERE usuario="'.$_POST['username'].'" AND password="'.sha1(md5($_POST['password'])).'"');

    if ($resultado_consulta->num_rows != 0) {
		
		while($resul = $resultado_consulta->fetch_assoc()){			
		$_SESSION['session_id_user'] = $resul['Id'];
		$_SESSION['session_nombre_user'] = $resul['nombre_completo'];	
		}
		
        $response['msg'] = 'OK';
		 
    }else $response['msg'] = '';
  }

  echo json_encode($response);

  $con->cerrarConexion();






 ?>