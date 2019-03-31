<?php
  //error_reporting(E_ALL ^ E_NOTICE);
  include "coneccion.php";
  $numero = 0;
  $variable = $_GET['dia'];
  $numero = $variable;
  $Con = new ApptivaDB;
  $miArray=$Con->buscarDia($variable);
  echo "Dia ".$variable."<br />";
  echo json_encode($miArray);
  echo "<br />"."<br />"."<br />"."<br />"."<br />";
  echo "Resumen Total <br />"; 
  $miArray=$Con->buscarTodo();
  echo json_encode($miArray);  
?>
