<?php
require_once("../valida_session/valida_session.php");
require_once ("../classes/Cliente.class.php");
         
$codigo = $_POST["cod"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$endereco = $_POST["endereco"];
$numero = $_POST["numero"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$telefone = $_POST["telefone"];

$objCli = new Clientes();


$dados = $objCli->editarPerfilCliente($codigo,$nome,$email,$endereco,$numero,$bairro,$cidade,$telefone);
if ($dados == 1){
    $_SESSION['nome_usu'] = $nome;
    $_SESSION['texto_sucesso'] = 'Os dados do cliente foram alterados no sistema.';
    header ("Location:editar_perfil_cliente.php");
}else{
    $_SESSION['texto_erro'] = 'Os dados do cliente não foram alterados no sistema!';
    header ("Location:editar_perfil_cliente.php");
}

        
?>