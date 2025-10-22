


<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Fazer Reserva</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f8f9fa;
    }
    .regras-box {
      background: #ffffff;
      border-left: 5px solid #0d6efd;
      padding: 20px;
      border-radius: 10px;
    }
    .regras-box h4 {
      color: #0d6efd;
      font-weight: 600;
    }
    .form-section {
      background: #ffffff;
      border-radius: 15px;
      box-shadow: 0 3px 10px rgba(0,0,0,0.1);
      padding: 30px;
    }
  </style>
</head>

<body>
<?php 
include "menu_publico.php"
?>
?>

<div class="container my-5">
  <h2 class="text-center mb-4 text-primary">Regras para fazer a sua Reserva</h2>

  <!-- Bloco de Regras -->
  <div class="regras-box mb-5">
    <h4>Antes de fazer sua reserva, leia com atenção:</h4>
    <ul class="mb-0 mt-3">
      <li>As reservas devem ser feitas com <strong>no mínimo 24 horas</strong> de antecedência.</li>
      <li>É possível reservar com <strong>até 45 dias</strong> de antecedência.</li>
      <li>Permitido apenas <strong>uma reserva por dia</strong> para o mesmo CPF.</li>
    </ul>
    <div class="mt-3 text-muted" style="font-size: 0.9rem;">
      Ao preencher o formulário abaixo, você confirma estar ciente das regras acima.
    </div>
  </div>

  <!-- Formulário -->
  <section class="form-section w-75 mx-auto">
    <h3 class="mb-4 text-center text-secondary">Fazer Reserva</h3>

    <form action="processa.php" method="post">

      <div class="mb-3">
        <label for="nome" class="form-label">Nome completo</label>
        <input type="text" class="form-control" id="nome" name="nome" required>
      </div>

      <div class="mb-3">
        <label for="cpf" class="form-label">CPF</label>
        <input type="text" class="form-control" id="cpf" name="cpf" maxlength="14" placeholder="000.000.000-00" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>

      <div class="mb-3">
        <label for="data" class="form-label">Data desejada</label>
        <input type="date" class="form-control" id="data" name="data" required>
      </div>

      <div class="mb-3">
        <label for="hora" class="form-label">Hora desejada</label>
        <input type="time" class="form-control" id="hora" name="hora" required>
      </div>

      <div class="mb-3">
        <label for="pessoas" class="form-label">Número de pessoas</label>
        <input type="number" class="form-control" id="pessoas" name="pessoas" min="1" required>
      </div>

      <div class="mb-3">
        <label for="motivo" class="form-label">Motivo da reserva (opcional)</label>
        <input type="text" class="form-control" id="motivo" name="motivo" placeholder="Ex: Aniversário, Casamento, Confraternização">
      </div>

      <div class="text-center">
    <a href=""></a>
      </div>
    </form>
  </section>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
