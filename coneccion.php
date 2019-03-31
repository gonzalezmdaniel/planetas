<?php
class ApptivaDB{
  private $host    = "localhost";
  private $usuario = "usuarioplanetas";
  private $clave   = "123";
  private $db      = "planetas";
  private $conexion;
  
  public function buscarTodo(){
    $conexion = new mysqli($this->host,$this->usuario,$this->clave,$this->db);
    if (mysqli_connect_error()){
      echo "conexion fallida".mysqli_connect_error();    exit();
    }
    $rawdata = array();
    $i=0;
    $resultado = mysqli_query($conexion,"SELECT count(*),clima FROM dias where clima='SEQUIA'");
    while($row = mysqli_fetch_array($resultado))
    {
       $rawdata[$i] = $row;
       $i++;
    }
   $resultado = mysqli_query($conexion,"SELECT count(*),clima FROM dias where clima='LLUVIA'");
    while($row = mysqli_fetch_array($resultado))
    {
       $rawdata[$i] = $row;
       $i++;
    }
    $resultado = mysqli_query($conexion,"SELECT count(*),clima FROM dias where clima='OPTIMO'");
    while($row = mysqli_fetch_array($resultado))
    {
       $rawdata[$i] = $row;
       $i++;
    }
    $resultado = mysqli_query($conexion,"SELECT dia,cantidad from picoLluvia where cantidad=(select max(cantidad) from picoLluvia) limit 1");
    while($row = mysqli_fetch_array($resultado))
    {
       $rawdata[$i] = $row;
       $i++;
    } 
    $conexion->close();
    return $rawdata;
  }
  
  public function buscarDia($elDia){
    $conexion = new mysqli($this->host,$this->usuario,$this->clave,$this->db);
    if (mysqli_connect_error()){
      echo "conexion fallida".mysqli_connect_error();     exit();
    } 
    $resultado = mysqli_query($conexion,"SELECT dia,clima FROM dias WHERE dia=$elDia");// or die($this->conexion->error);
    $rawdata = array();
    $i=0;
    while($row = mysqli_fetch_array($resultado))
    {
        $rawdata[$i] = $row;
        $i++;
    }
    $conexion->close();
    return $rawdata;
  }
}
