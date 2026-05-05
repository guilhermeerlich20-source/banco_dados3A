<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Exercícios</title>
</head>
<body>
<?php require_once "_parts/_menu.php";
$gruposMusculares = ["Abdômen", "Peito", "Costas", "Braços", "Pernas", "Ombros", "Glúteos", "Panturrilhas", "Trapézio", "Antebraços", "Adutores", "Abdutores", "Lombar", "Cardio", "Funcional"];
?>
<main class="container" style="margin-top: 80px">
<div class="md-5">
  <h4>Cadastro de Exercício</h4>
</div>
<!-- existe dois tipo de enviar o formulario o post e o get, a diferença que o pot vai em um envelope, e o get vai no href -->
<div class="card">
  <form action="db-exercicio.php" method="post" class="row g3 mt-3 p-3">
    <div class="col-12">
      <label for="nome" class="form-label">Nome do exercício</label>
      <input type="text" class="form-control" name="nome" id="nome" class="form-control" placeholder="Nome do exercício" required>
    </div>
    <div class="com-12">
      <label for="descricao" class="form-label">Descrição do exercício</label>
      <textarea name="descricao" id="descricao" class="form-control" placeholder="Descrição do exercício"></textarea>
    </div>

    <div class="col-md-6">
      <label for="grupoMuscular" class="form-label">Grupo Muscular</label>
      <select name="grupoMuscular" id="grupoMuscular" class="form-select">
       <option>Selecione um grupo</option>
       <?php foreach ($gruposMusculares as $grupo): ?>
        <option value="<?php echo $grupo; ?>"><?= $grupo; ?></option>
       <?php endforeach; ?>
      </select>
    </div>
    <div class="col-12 mt-3">
      <a href="exercicios.php" class="btn btn-outline-secondary">Voltar</a>
      <button type="submit" class="btn btn-primary" name="btnSalvar">Salvar</button>
    </div>
    
  </form>
</div>

</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>