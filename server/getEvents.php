<?php

  require('conector.php');
  session_start();

  $con = new ConectorBD('localhost','root','12629752');
  
 $cod = $_SESSION['session_id_user'];

  $response['conexion'] = $con->initConexion('agenda');

  if ($response['conexion']=='OK') {
    $resultado_consulta = $con->consultar(['evento'],['Id','titulo','start_date','start_hour','end_date','end_hour','cod_usuario','allDay'], ' WHERE cod_usuario="'.$cod.'"');

    if ($resultado_consulta->num_rows != 0) {	
	$i=0;			
		while($resul = $resultado_consulta->fetch_assoc()){	
						
		$response['eventos'][$i]['id'] = $resul['Id'];
		$response['eventos'][$i]['title'] = $resul['titulo'];
		$sw= $resul['allDay'];
		if($sw=='true'){
			$response['eventos'][$i]['start'] = $resul['start_date'];			
		}else{	
		$response['eventos'][$i]['start'] = $resul['start_date']."T".$resul['start_hour'];
		$response['eventos'][$i]['end'] = $resul['end_date']."T".$resul['end_hour'];		
				
			}
		$i++;		
		}		
        $response['msg'] = 'OK';
		 
    }else if($cod){ 
	$response['msg'] = 'OK';
	}
	
  }

  echo json_encode($response);

  $con->cerrarConexion();






 ?>