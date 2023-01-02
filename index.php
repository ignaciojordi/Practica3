<?php
session_start(); // START THE SESION
$conn = mysqli_connect("localhost","root","","php_login_database"); // Connect to database
if(!$conn ){
    echo 'no funciona';
    die("Cannot connect: ".mysqli_error($conn));} // If can not connect: show error

  require 'database.php';
  
  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  } 
  
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CREA TU PROPIO CV</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="diseño/css/style.css">
  </head>
  <body>
    <?php require 'cabecerita/header.php' ?>

    <?php if(!empty($user)): ?>
        <!DOCTYPE html>
<html>
<head>
<title>CURRICULUM</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>
</head>
<body>
  <!-- Create your CV-->
  <div class="text-center">
                <form action="" method="post">
                <button class="btn btn-dark" name="create_cv" value="Send"  placeholder="submit">Create your CV</button> 
                </form>
                </div>
</body>
</html>
      <br> Bienvenido <?= $user['email']; ?>
      <br>Has iniciado sesión correctamente
      <a href="logout.php">
        Cerrar sesión
      </a>
    <?php else: ?>
      <h1>Inicia sesión o regístrate para ver el CV de Ignacio</h1>

      <a href="cv.php">Iniciar Sesión</a> |
      <a href="registre.php">Regístrate</a>
    <?php endif; ?>
   
  </body>
 
 
  <?php
  if (isset($_POST['create_cv'])){
        ?>
        <div class="container mt-5">
            <form action="alta.php" class="tablalogin" method="post"> <!-------------------------------------------------------Formulario una vez has inciado sesión-->
                <input type="text" placeholder="Nombre" class="form-control my-3 bg-grey  text-center"name="nombre" >
                <input type="text" placeholder="Email" class="form-control my-3 bg-grey  text-center"name="email" >
                <input type="text" placeholder="Edad" class="form-control my-3 bg-grey  text-center"name="edad" >
                <input type="text" placeholder="experiencialab1" class="form-control my-3 bg-grey  text-center"name="experiencialab1" >
                <input type="text" placeholder="experiencialab2" class="form-control my-3 bg-grey  text-center"name="experiencialab2" >
                <input type="text" placeholder="idiomas" class="form-control my-3 bg-grey  text-center"name="idiomas" >
                <input type="text" placeholder="instagram" class="form-control my-3 bg-grey  text-center"name="instagram" >
              
                <button class="btn btn-dark" name="register"value="Send"  placeholder="submit">SEND</button> 
                
                 <!-- ------------SEND BUTTON --> 
                <a href="index.php"> GO BACK</a>
            </form>    
        </div>
        
        <?php
$query = "SELECT * FROM `php_login_database`";


?>

        <?php
    }
    ?>
  

</html>

