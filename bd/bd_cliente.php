<?php 

require_once("conecta_bd.php");

function consultaStatusCliente($tabela,$cod_usuario,$status){
    $conexao = conecta_bd();
    $query = $conexao->prepare("SELECT count(*) AS total
                FROM $tabela
                WHERE cod_cliente = ? AND status = ?");

    $query->bindParam(1,$cod_usuario);
    $query->bindParam(2,$status);
    $query->execute();
    $total = $query->fetchAll(PDO::FETCH_ASSOC);

    return $total;
}

function cadastraCliente($nome,$email,$senha,$endereco,$numero,$bairro,$cidade,$telefone,$status,$perfil,$data){
    $conexao = conecta_bd();

    $query = $conexao->prepare("INSERT INTO cliente(nome,email,senha,endereco,numero,bairro,
            cidade,telefone,status,perfil,data) VALUES (?,?,?,?,?,?,?,?,?,?,?)");

    $query->bindParam(1,$nome);
    $query->bindParam(2,$email);
    $query->bindParam(3,$senha);
    $query->bindParam(4,$endereco);
    $query->bindParam(5,$numero);
    $query->bindParam(6,$bairro);
    $query->bindParam(7,$cidade);
    $query->bindParam(8,$telefone);
    $query->bindParam(9,$status);
    $query->bindParam(10,$perfil);
    $query->bindParam(11,$data);
    $retorno = $query->execute();
    if($retorno){
        return 1;
    } else{
        return 0;
    }        
}
?>