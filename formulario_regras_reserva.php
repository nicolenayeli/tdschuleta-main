<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Formulário com Bootstrap</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>



<div class="container mt-5">
<h2> Regras para fazer a reserva</h2>

</div>

<section class="container my-5">
<div class="p-3 rounded-4 shadow-lg bg-white w-75 mx-auto" style="height: auto; min-height: 350px; max-height: 500px;">
    <h2 class="mb-4">Fazer Reserva</h2>

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
        <label for="hora" class="form-label">Hora</label>
        <input type="time" class="form-control" id="hora" name="hora" required>
      </div>

      <button type="submit" class="btn btn-primary">Confirmar</button>
    </form>
  </div>

  <!-- Bootstrap JS Bundle (opcional, só se usar componentes interativos) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </section>
</body>

</html>
