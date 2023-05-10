<?php
    require_once("Conexao.class.php");

    class Clientes{
        private $con;
        private $nome;
        private $email;
        private $senha;
        private $endereco;
        private $numero;
        private $bairro;
        private $cidade;
        private $telefone;

    public function __construct(){
        $this->con = new Conexao();
    }

        function editarPerfilCliente($codigo,$nome,$email,$endereco,$numero,$bairro,$cidade,$telefone){
            try{
                $this->codigo = $codigo;
                $this->nome = $nome;
                $this->email = $email;
                $this->data = $endereco;
                $this->data = $numero;
                $this->data = $bairro;
                $this->data = $cidade;
                $this->data = $telefone;
        
                $query = $this->con->conectar()->prepare("SELECT * FROM cliente WHERE cod = ?");
                $query->bindParam(1,$this->codigo);
                $query->execute();
                $retorno = $query->fetch(PDO::FETCH_ASSOC);
                if(count($retorno) > 0){
                    $query = $this->con->conectar()->prepare("UPDATE cliente SET nome = ?, email = ?, endereco = ?, numero = ?,
                    bairro = ?, cidade = ?, telefone = ? WHERE cod = ?");
                    $query->bindParam(1, $nome);
                    $query->bindParam(2, $email);
                    $query->bindParam(3, $endereco);
                    $query->bindParam(4, $numero);
                    $query->bindParam(5, $bairro);
                    $query->bindParam(6, $cidade);
                    $query->bindParam(7, $telefone);
                    $query->bindParam(8, $codigo);
                    $retorno = $query->execute();//retorno boolean padrao TRUE
                    if($retorno){
                        return 1;
                    } else{
                        return 0;
                    }        
                }
            } catch(PDOException $ex){
            return 'error'.$ex->getMessage();
            }
        }
    }
?>