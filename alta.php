<?php
session_start(); // START THE SESION
$conn = mysqli_connect("localhost","root","","php_login_database"); // Connect to database
if(!$conn ){
    echo 'no funciona';
    die("Cannot connect: ".mysqli_error($conn));} // If can not connect: show error
$nombre= ($_POST['nombre']);
$email= ($_POST['email']);
$edad= ($_POST['edad']);
$experiencialab1= ($_POST['experiencialab1']);
$experiencialab2= ($_POST['experiencialab2']);
$idiomas= ($_POST['idiomas']);
$instagram= ($_POST['instagram']);
        //$username= ($_POST['username']);
    
        
        //INSERT THE DATA WE OBTAIN FROM THE FORM TO THE VALUES OF THE DATABASE
        $query="INSERT INTO ignacio_final (nombre,email,edad,experiencialab1,experiencialab2,idiomas,instagram) VALUES ( '$nombre', '$email','$edad','$experiencialab1','$experiencialab2','$idiomas','$instagram')"; 
        
        
        //borrar la sesión
        header('Location: index.php');
        exit();

?>