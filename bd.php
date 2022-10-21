<?php
 $server ='localhost';
 $username ='root';
 $password ='Cu4dr42022%';
 $database ='usuarios_kiosco';

 try{
  $conn =  new PDO("mysql:host=$server;dbname=$database;",$username,  $password);
 } catch(PDOException $e) {
   die('Connection failed: ' . $e->getMessage());
 }
?>