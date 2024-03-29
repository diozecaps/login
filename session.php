<?php
session_start();
require_once "configBD.php";

if(isset($_SESSION['nomeDoUsuario'])){
    //Logado
    $usuario = $_SESSION['nomeDoUsuario'];
    $sql = $connect->prepare("SELECT * FROM usuario WHERE nomeDoUsuario = ?");
    $sql->bind_param("s",$usuario);
    $sql->execute();
    $resultado = $sql->get_result();
    $linha = $resultado->fetch_array(MYSQLI_ASSOC);

    $nomeDoUsuario = $linha['nomeDoUsuario'];
    $nomeCompleto = $linha['nomeCompleto'];
    $emailUsuario = $linha['emailUsuario'];
    $dataCriar = $linha['dataCriar'];

    //conversão de data
    $dataCriar = date('d/m/Y', strtotime($dataCriar));


}else{
    //Se não estiver logado, redirecionar para index
    header("location: index.php");
}