<?php
include 'database.php';
function numeroFilasCv($php_login_database,$nombre){
    $idCvUsuario=idCv($php_login_database,$nombre);
    $sql = "SELECT CV_id_cv FROM secciones WHERE CV_id_cv = ? ";
    $stmt = mysqli_stmt_init($php_login_database);
    if(!mysqli_stmt_prepare($stmt,$sql)){ // Comprobación de si puede conectarse
      header('Location: https://ignaciojordi.alwaysdata.net/practica3_ignaciojordi_joanisern/index.php?ok=3');
      exit();
    }
    mysqli_stmt_bind_param($stmt,"s",$idCvUsuario);
    mysqli_stmt_execute($stmt);
    $result=mysqli_stmt_get_result($stmt);
    $filas=mysqli_num_rows($result);
    return $filas;
    mysqli_stmt_close($stmt);
  }

function idSeccion($php_login_database,$nombre){
    $sql="SELECT id_secciones FROM secciones WHERE nombre = ?";
    $stmt=mysqli_stmt_init($php_login_database);
    if(!mysqli_stmt_prepare($stmt,$sql)){
      header('Location: https://ignaciojordi.alwaysdata.net/practica3_ignaciojordi_joanisern/registre.php?cm=9');
      exit();
    }
    mysqli_stmt_bind_param($stmt,"s",$nombre);
    mysqli_stmt_execute($stmt);
    $result=mysqli_stmt_get_result($stmt); 
  
    if($columna=mysqli_fetch_assoc($result)){ 
      return $columna;
    }
    mysqli_stmt_close($stmt);
  }

function nombreSeccion ($php_login_database,$nombre){
    $idCvUsuario=idCv($php_login_database,$nombre);
    $sql="SELECT nombre FROM secciones WHERE CV_id_cv = $idCvUsuario";
    $stmt=mysqli_stmt_init($connexionDatabase);
    if(!mysqli_stmt_prepare($stmt,$sql)){
      header('Location: https://ignaciojordi.alwaysdata.net/practica3_ignaciojordi_joanisern/registre.php?cm=5');
      exit();
    }
    mysqli_stmt_execute($stmt); //Ejecución de la sentencia
    $result=mysqli_stmt_get_result($stmt); // Devuelve el resultado de la búsqueda
    $array=[];
    foreach($result as $columna){
      $array[]=$columna['nombre'];
    }
    return $array;
    mysqli_stmt_close($stmt);
  }

  function comprobacioncurriculum($php_login_database,$nombre){
    $resultado=true;
    $seleccionUsuario=comprobacionUsuario($php_login_database,$nombre);
    $id=$seleccionUsuario['id_users'];
    $sql="SELECT * FROM CV WHERE users_id_users	 = ?"; 
    $stmt=mysqli_stmt_init($php_login_database); 
   

    if(!mysqli_stmt_prepare($stmt,$sql)){
      header('Location: https://ignaciojordi.alwaysdata.net/practica3_ignaciojordi_joanisern/registre.php?cm=5');
      exit();
    }
  
    mysqli_stmt_bind_param($stmt,"s",$id); 
    mysqli_stmt_execute($stmt); 
  
    $result=mysqli_stmt_get_result($stmt); 
  
    if($columna=mysqli_fetch_assoc($result)){ 
      return $columna;
  
    }else{
      $resultado=false;
      return $resultado;
    }
    mysqli_stmt_close($stmt);
  }
  
?>