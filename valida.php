<?php
session_start(); // START THE SESION
$conex = mysqli_connect("localhost","root","","php_login_database"); // Connect to database
if(!$conex ){
    echo 'no funciona';
    die("Cannot connect: ".mysqli_error($conex));} // If can not connect: show error

?>
<!DOCTYPE html>
<html>
<head>
<title> CV EDIT</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php

if(isset($_POST["edit"])){  // If the button edit is activated then: send this form to EDIT.PHP 
    $text= $_POST['texto'];
    
    ?>
        <form method="post" action="index.php"> <!-- This table will be displayed and will send the info to edit.php to udate-->
            <div class=" tablalogin container mt-5"> 
                <h3><strong>Escribe tu experiencia</strong></h3>
                <h2><strong>Puesto de trabajo</strong></h2><input class="form-control my-3 bg-grey text-black text-center" type="text" name="titlo" placeholder=" New blog Title">
                <p><strong>Empresa</strong></p> 
                <!--<input type="text" class="form-control my-3 bg-grey text-black" cols="30" rows="10" class="article" name="message" placeholder="Write here the new text"><br></br>-->
                <textarea type="text"name="message" placeholder="Write here the NEW text"class="form-control my-3 bg-grey text-black" cols="30" rows="10"></textarea>
                <h3>Categoria </h2>                                                                <!-- ------------CATEGORY CHECKBOX -->
                

                <br></br><button type="submit" name="buttonedit">send</button> <!-- ------------SEND BUTTON --> 

                <input type="hidden" name="texto" value="<?php echo $text; ?>"></input>
                <!-- ------------SEND BUTTON --> 
                <a href="index.php">CLOSE</a>
            </div>
        </form>
    <?php
}

if(isset($_POST["delete"])){ // If the delete button is activated then automatically UPDATE THE SESION with this header and update the info (deleting the post)
    $text= ($_POST['texto']);
    $querydelete= "DELETE FROM `php_login_data` WHERE Texto = '$text'";
    $resulta = mysqli_query($conn,$querydelete);
    header('Location:prueba.php');
    exit();
}
?>
</html>
