<?php

  require 'bd.php';
  
 

$message ='';

if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'] )) {
  $sql = "INSERT INTO  user (username, email, password) VALUES(:username, :email, :password)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':username', $_POST['username']);
  $stmt->bindParam(':email', $_POST['email']);
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
  $stmt->bindParam(':password', $password);

  

if ($stmt->execute()) {
    $message ='Usuario registrado exitosamente';
    }else {
       $message ='Error al registrar el usuario';
   }

   
  
}
?>   
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Registrarse </title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    
  <?php require 'partials/header.php' ?>

  

   <?php if(!empty($message)): ?>
     <p><?= $message ?></p>
   <?php endif;?>
   



  <h1>Registrarse</h1>
  <span> o <a href="entrar.php"> entrar</a></span>
    
  

    <form action ="registrarse.php" method="POST" >
        <input name="username" type="number"   placeholder="Ingresa tu Usuario"  minlength="5" maxlength="5" required  >
        <input name="email"  type=text placeholder="Ingresa tu Correo" required>
        <input name="confirma_email"  type="text" placeholder="Confirma tu correo" required >
        <input name="password"  type="password" placeholder="Ingresa tu contraseña" required>
        <input name="confirma_password" required type="password" placeholder="Confirma tu contraseña">
        <input type="submit" value="Entrar">
    </form>

    </form>
    
    
  ?> 
     
  </body>
</html>