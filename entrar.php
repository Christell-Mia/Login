<?php

 session_start();


if(isset($_SESSION['user_id'])) {
  header('Location: /ProyectoNuevo');
}


require 'bd.php';

  if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, username, email, password FROM user WHERE username = :username');
    $records->bindParam(':username', $_POST['username']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

  
  $message = '';
 
   
  if (is_countable($results) > 0 && password_verify($_POST['password'], $results['password'])){
    $_SESSION['user_id'] = $results['id'];
    header("Location: /ProyectoNuevo");
    } else{
      $message = 'Las credenciales no coinciden o  Necesitas Registrarte'; 
  } 

   

}


?>
<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="utf-8">
    <title> Entrar </title>
    
   
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  
  <body>
  
   <?php require 'partials/header.php' ?>
   
    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Login</h1>
    <span> o  <a href="registrarse.php">Registrarse</a></span>

     
    

    <form action ="entrar.php"  method="POST" >
        <input name="username"  type="number"  placeholder="Ingresa tu Usuario"  required >
        <input name="password" type="password" required placeholder="Ingresa tu contraseña" >
        <input type="submit" value="Entrar">
       
      
    </form>
        
      
  </body>

</html>