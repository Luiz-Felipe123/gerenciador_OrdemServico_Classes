<?php
    require_once("Conexao.class.php");

    class Terceirizados{
        private $con;
        private $nome;
        private $email;
        private $senha;
        private $telefone;

    public function __construct(){
        $this->con = new Conexao();
    }

        function editarPerfilTerceirizado($codigo,$nome,$email,$telefone){
            try{
                $this->codigo = $codigo;
                $this->nome = $nome;
                $this->email = $email;
                $this->telefone = $telefone;
        
                $query = $this->con->conectar()->prepare("SELECT * FROM terceirizado WHERE cod = ?");
                $query->bindParam(1,$this->codigo);
                $query->execute();
                $retorno = $query->fetch(PDO::FETCH_ASSOC);
                if(count($retorno) > 0){
                    $query = $this->con->conectar()->prepare("UPDATE terceirizado SET nome = ?, email = ?, telefone = ? WHERE cod = ?");
                    $query->bindParam(1, $nome);
                    $query->bindParam(2, $email);
                    $query->bindParam(3, $telefone);
                    $query->bindParam(4, $codigo);

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