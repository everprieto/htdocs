<?php

//require_once 'index.php';

//if(isset($_GET["datos"])){  
//   $datos = $_GET['datos'];
//} else{
//    
// $datos=1;
//}

  $datos=1;
if(isset($_GET['datos'])){  
   $datos = $_GET['datos']; 
   
} 
  //$CantidadMostrar=10;
//$CantidadMostrar=$final;
//Conexion  al servidor mysql
$conetar = new mysqli("localhost", "root", "123456", "turl");
if ($conetar->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conetar->connect_errno . ") " . $conetar->connect_error;
}else{
       
    // Validado de la variable GET
        $compag         =(int)(!isset($_GET['pag'])) ? 1 : $_GET['pag']; 
	$TotalReg       =$conetar->query("SELECT * FROM ejemplo_paginacion");
	//Se divide la cantidad de registro de la BD con la cantidad a mostrar 
	$TotalRegistro  =ceil($TotalReg->num_rows/$CantidadMostrar);
	echo "<b>La cantidad de registro ".$TotalReg->num_rows." se dividio a:  ".$CantidadMostrar."</b> para mostrar ".$TotalRegistro." paginas y ".$compag." pagina actual<br>";
	//Consulta SQL
	$consultavistas ="SELECT
						ejemplo_paginacion.id,
						ejemplo_paginacion.Nombre,
						ejemplo_paginacion.Apellido
						FROM
						ejemplo_paginacion
						ORDER BY
						ejemplo_paginacion.id ASC
						LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;
	$consulta=$conetar->query($consultavistas);
         echo "<table><tr><th>Codigo</th><th>Nombre</th><th>Apellido</th></tr>";
	while ($lista=$consulta->fetch_row()) {
	     echo "<tr><td>".$lista[0]."</td><td>".$lista[1]."</td><td>".$lista[2]."</td></tr>";
	}
	    echo "</table>";
     
    /*Sector de Paginacion */
    
    //Operacion matematica para botón siguiente y atrás 
	$IncrimentNum =(($compag +1)<=$TotalRegistro)?($compag +1):1;
  	$DecrementNum =(($compag -1))<1?1:($compag -1);
  
	echo "<ul><li class=\"btn\"><a href=\"?pag=".$DecrementNum."\">Ant</a></li>";
    //Se resta y suma con el numero de pag actual con el cantidad de 
    //números  a mostrar
     $Desde=$compag-(ceil($CantidadMostrar/2)-1);
     $Hasta=$Desde+5;
     //if($TotalRegistro>=5){ $hasta==$TotalRegistro-5;}else{$Hasta=$TotalRegistro;};//+(ceil($CantidadMostrar/2)-1);
     //Se valida
     $Desde=($Desde<1)?1: $Desde;
     $Hasta=($Hasta<$CantidadMostrar)?$CantidadMostrar:$Hasta;
     
     //Se muestra los números de paginas
     for($i=$Desde; $i<=$Hasta;$i++){
     	//Se valida la paginacion total
     	//de registros
     	if($i<=$TotalRegistro){
     		//Validamos la pag activo
       
            
            
     	  if($i==$compag){
           echo "<li class=\"active\"><a href=\"?pag=".$i."&datos=".$CantidadMostrar."\">".$i."</a></li>";
            
     	  }else {
     	  	echo "<li><a href=\"?pag=".$i."&datos=".$CantidadMostrar."\">".$i."</a></li>";
               
     	  }     		
     	}
     }
	echo "<li class=\"btn\"><a href=\"?pag=".$IncrimentNum."&datos=".$CantidadMostrar."\">Sig</a></li></ul>";
       
  
}
?>
