<?php
    require_once("Conexao.class.php");

    class Generica{
        private $con;
        private $senha;
        private $email;

        public function __construct(){
            $this->con = new Conexao();
        }

        public function checaLogin($tabela,$email,$senha){
          try{
            $this->email = $email;
            $this->senha = md5($senha);
            
            $query = $this->con->conectar()->prepare("SELECT  * FROM $tabela WHERE email= ? AND senha = ?");
            $query->bindParam(1,$this->email);
            $query->bindParam(2,$this->senha);
            $query->execute();
            $retorno = $query->fetch(PDO::FETCH_ASSOC);    
            return $retorno;

          }catch(PDOException $ex){
              return 'error'.$ex->getMessage();

          }
    }

        function buscaDadoseditarPerfil($tabela,$codigo){
        try{
            $this->codigo = $codigo;

            $query = $this->con->conectar()->prepare("SELECT * FROM $tabela WHERE cod = ?");
            $query->bindParam(1,$this->codigo);
            $query->execute();
            $lista = $query->fetch(PDO::FETCH_ASSOC);

            return $lista;

        }catch(PDOException $ex){
            return 'error'.$ex->getMessage();

            }
        }
    }
?>