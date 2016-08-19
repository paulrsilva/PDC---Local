<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Portal do Candidato</title>
</head>
<body>
 
<div id="container">
  <h1>Bem Vindo ao PDC!!</h1>
  
  <?php
    $path = $_GET['path'];
    echo $path;
    ?>
  
  
  <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
 
</body>
</html>