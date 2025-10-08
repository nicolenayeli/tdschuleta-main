=<?php
include_once "db.php";
 
class Reserva {
    private $id;
    private $idcliente;
    private $data_reserva;
    private $horario;
    private $qntd_pessoas;
    private $motivo;
    private $status;
    private $codigo_reserva;
    private $data_criacao;
    private $data_atualizacao;
    private $pdo;
 
    public function __construct() {
        $this->pdo = getConnection();
        $this->status = 'pendente';
        $this->data_criacao = date('Y-m-d H:i:s');
        $this->codigo_reserva = uniqid('res-'); // código automático
    }
 
    // Getters e setters (igual ao modelo do professor)
    public function getId() {
        return $this->id;
    }
 
    public function getIdCliente() {
        return $this->idcliente;
    }
 
    public function setIdCliente($idcliente) {
        $this->idcliente = $idcliente;
    }
 
    public function getDataReserva() {
        return $this->data_reserva;
    }
 
    public function setDataReserva($data) {
        $this->data_reserva = $data;
    }
 
    public function getHorario() {
        return $this->horario;
    }
 
    public function setHorario($horario) {
        $this->horario = $horario;
    }
 
    public function getQntdPessoas() {
        return $this->qntd_pessoas;
    }
 
    public function setQntdPessoas($qtd) {
        $this->qntd_pessoas = $qtd;
    }
 
    public function getMotivo() {
        return $this->motivo;
    }
 
    public function setMotivo($motivo) {
        $this->motivo = $motivo;
    }
 
    public function getStatus() {
        return $this->status;
    }
 
    public function setStatus($status) {
        $this->status = $status;
    }
 
    public function getCodigoReserva() {
        return $this->codigo_reserva;
    }
 
    public function getDataCriacao() {
        return $this->data_criacao;
    }
 
    public function getDataAtualizacao() {
        return $this->data_atualizacao;
    }
 
    public function setDataAtualizacao($data) {
        $this->data_atualizacao = $data;
    }
 
    // Inserir reserva no banco
    public function inserir(): bool {
        $sql = "INSERT INTO reservas 
                (idcliente, data_reserva, horario, qntd_pessoas, motivo, status, codigo_reserva, data_criacao)
                VALUES
                (:idcliente, :data_reserva, :horario, :qntd_pessoas, :motivo, :status, :codigo_reserva, :data_criacao)";
 
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":idcliente", $this->idcliente);
        $cmd->bindValue(":data_reserva", $this->data_reserva);
        $cmd->bindValue(":horario", $this->horario);
        $cmd->bindValue(":qntd_pessoas", $this->qntd_pessoas);
        $cmd->bindValue(":motivo", $this->motivo);
        $cmd->bindValue(":status", $this->status);
        $cmd->bindValue(":codigo_reserva", $this->codigo_reserva);
        $cmd->bindValue(":data_criacao", $this->data_criacao);
 
        if ($cmd->execute()) {
            $this->id = $this->pdo->lastInsertId();
            return true;
        }
        return false;
    }
 
    // Listar todas as reservas
    public function listar(): array {
        $cmd = $this->pdo->query("SELECT * FROM reservas ORDER BY data_reserva DESC");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }
 
    // Buscar reserva por ID
    public function buscarPorId(int $id): bool {
        $sql = "SELECT * FROM reservas WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $id);
        $cmd->execute();
 
        if ($cmd->rowCount() > 0) {
            $dados = $cmd->fetch(PDO::FETCH_ASSOC);
            $this->id = $dados['id'];
            $this->idcliente = $dados['idcliente'];
            $this->data_reserva = $dados['data_reserva'];
            $this->horario = $dados['horario'];
            $this->qntd_pessoas = $dados['qntd_pessoas'];
            $this->motivo = $dados['motivo'];
            $this->status = $dados['status'];
            $this->codigo_reserva = $dados['codigo_reserva'];
            $this->data_criacao = $dados['data_criacao'];
            $this->data_atualizacao = $dados['data_atualizacao'];
            return true;
        }
        return false;
    }
 
    // Confirmar reserva
    public function confirmar(int $numero_mesa): bool {
        $sql = "UPDATE reservas SET status = 'confirmada', numero_mesa = :mesa, data_atualizacao = NOW() WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":mesa", $numero_mesa);
        $cmd->bindValue(":id", $this->id);
        return $cmd->execute();
    }
 
    // Cancelar reserva
    public function cancelar(): bool {
        $sql = "UPDATE reservas SET status = 'cancelada', data_atualizacao = NOW() WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $this->id);
        return $cmd->execute();
    }
}
?>