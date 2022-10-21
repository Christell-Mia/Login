<?php
  session_start();

  require 'bd.php';
  
  if(isset($_SESSION['user_id'])){
   $records =$conn->prepare('SELECT id, username, email, password  FROM user WHERE id =:id'); 
   $records->bindParam(':id', $_SESSION['user_id']);
   $records->execute();
   $results = $records->fetch(PDO::FETCH_ASSOC);
   

   $user = null;

  if(count($results) > 0){
    $user = $results;
   }
  } 
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Bienvenidos a Cuadra </title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="assets/css/style.css">
    
  </head>
  <body>
  
    <?php require  'partials/header.php' ?>
       

   

      <?php if(!empty($user)): ?>
      <br> Welcome. <?= $user['username']; ?>
      <br>Esta es tu información
      <a href="cerrar.php">
        Cerrar Seción
      </a>

      <?php else: ?>
        <h1>Entrar o Registrarse</h1>
        <a href="entrar.php">Entrar</a> or
        <a href="registrarse.php">Registrarse</a>
      <?php endif; ?>
        
  </body>
</html>