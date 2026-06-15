<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <title>Alunos</title>
</head>

<body>
  <?php
  require_once "_parts/_menu.php";

  spl_autoload_register(function ($class) {
    require_once "class/{$class}.class.php";
  });

  $aluno = new Aluno();

  $alunos = $aluno->sp_banco('sp_listar_alunos()');

  ?>

  <main class="container">
    <div class="mt-5 d-flex justify-content-between p-5">
      <h3 class>Alunos</h3>
      <a href="ger-aluno.php" class="btn btn-success">Novo Aluno</a>
    </div>

    <div class="mt-4">
      <div class="mb-3">
        <input type="text" name="campo-filtro" id="campo-filtro" class="form-control"
          placeholder="🔍 Digite para filtrar" title="Digita para filtrar pelo nome do exercício">
      </div>
      <table class="table" id="tabela-exercicios">
        <thead>
          <tr class="table-dark">
            <th class="text-center">#</th>
            <th>Nome</th>
            <th>Celular</th>
            <th>E-mail</th>
            <th class="text-center">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($alunos as $aluno):
            ?>
            <tr>
              <td class="text-center"><?= $aluno->idaluno ?></td>
              <td><?= $aluno->nome ?></td>
              <td><?= $aluno->celular ?></td>
              <td><?= $aluno->email ?></td>
              <td class="d-flex gap-1 justify-content-center">
                <a href="#" class="btn btn-sm btn-outline-info">
                  <i class="bi bi-eye"></i>
                </a>
                <a href="ger-aluno.php?id=<?= $aluno->idaluno ?>" class="btn btn-sm btn-outline-secondary">
                  <i class="bi bi-pencil-square"></i>
                </a>
                <form action="db-aluno.php" method="post">
                  <input type="hidden" name="id" value="<?= $aluno->idaluno ?>">
                  <button type="submit" class="btn btn-sm btn-outline-danger" name="btn-deletar" onclick="return confirm('Tem certeza que deseja deletar o aluno?');">
                    <i class="bi bi-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
      <div id="msg-vazio" class="d-flex justify-content-center alert alert-info p-3 d-none">
        <i class="bi bi-info-circle mx-2"></i> Nenhum aluno encontrado para o filtro digitado.
      </div>
    </div>
  </main>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/tb-interativa.js"></script>
  <script src="js/exercicios.js"></script>
</body>

</html>