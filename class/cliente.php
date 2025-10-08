<?php 
include_once "db.php";

class Cliente {
    private $id;
    private $nome;
    private $cpf;
    private $email;
    private $senha;
    private $pdo;

    public function __construct(){
        $this->pdo  = getConnection();
    }

    // GETTERS E SETTERS
    public function getId(){
        return $this->id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome(string $nome){
        $this->nome = $nome;
    }

    public function getCpf(){
        return $this->cpf;
    }

    public function setCpf(string $cpf){
        $this->cpf = $cpf;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail(string $email){
        $this->email = $email;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha(string $senha){
        $this->senha = $senha;
    }

    // INSERIR CLIENTE
    public function inserir(): bool {
        $sql = "INSERT INTO clientes (nome_completo, cpf, email, senha) 
                VALUES (:nome_completo, :cpf, :email, :senha)";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":nome_completo", $this->nome);
        $cmd->bindValue(":cpf", $this->cpf);
        $cmd->bindValue(":email", $this->email);
        $cmd->bindValue(":senha", $this->senha);

        if($cmd->execute()){
            $this->id = $this->pdo->lastInsertId();
            return true;
        }
        return false;
    }

    // ATUALIZAR CLIENTE
    public function atualizar(): bool {
        if (!$this->id) {
            throw new Exception("ID do cliente não definido para atualização.");
        }

        $sql = "UPDATE clientes SET nome_completo = :nome_completo, cpf = :cpf, email = :email, senha = :senha
                WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":nome_completo", $this->nome);
        $cmd->bindValue(":cpf", $this->cpf);
        $cmd->bindValue(":email", $this->email);
        $cmd->bindValue(":senha", $this->senha);
        $cmd->bindValue(":id", $this->id);

        return $cmd->execute();
    }
}
?>
