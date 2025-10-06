<?php 
include_once "db.php";


class Cliente{
private $id;
private $nome;
private $cpf;
private $email;
private $senha;
private $pdo;
public function __construct(){
    $this->pdo  = getConnection();
}
public function getId(){
     return $this->id;
}
public function getNome(){
    return $this->nome;
}
public function setNome(string $nome){
    $this-> nome = $nome;
}

public function getCpf(){
return $this->cpf;
}

public function setCpf(int $cpf){
    $this->cpf = $cpf;
}
public function getEmail(){
    return $this->email;
}
public function setEmail(string $email){
    $this->email=$email;
}

public function getSenha(){
   return $this->senha;
}
public function setSenha(string $senha){
    $this->senha=$senha;
}

    public function inserir():bool{
        $sql = "insert into clientes (nome_completo, cpf, email, senha) values(:nome_completo, :cpf, :email, :valor, :senha)";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":nome_completo", $this->nome); // (C#) cmd.Paramenters.AddWithValue("splogin", Login);
        $cmd->bindValue(":cpf", $this->cpf);
        $cmd->bindValue(":email", $this->email);
        $cmd->bindValue(":senha", $this->senha);

        if($cmd->execute()){
            $this->id = $this->pdo->lastInsertId();
            return true;
        }
        return false;
    }


    

}
?>
