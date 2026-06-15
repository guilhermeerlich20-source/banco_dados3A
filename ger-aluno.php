<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <title>Cadastro de Aluno</title>
</head>
<body>
  <?php
  session_start();
  require_once "_parts/_menu.php";

  spl_autoload_register(function ($class) {
    require_once "class/{$class}.class.php";
  });

  $id = null;
  $aluno = null;

  if (filter_has_var(INPUT_GET, "id")) {
    $id = intval(filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT));
    $alunoModel = new Aluno();
    $aluno = $alunoModel->search('idaluno', $id);
  }

  $fkusuario = $_SESSION['user_id'] ?? 0;
  ?>

  <main class="container" style="margin-top: 80px;">
    <h1>Cadastro de Aluno</h1>
    <form action="db-aluno.php" method="post" class="mt-1 p-3">
  <div class="card">
    <div class="card-body mt-3">
      <h3>Dados do Aluno</h3>
      <div class="row g-3">
        <div class="col-md-5">
          <label for="email" class="form-label">E-mail</label>
          <input type="email" name="email" id="email" class="form-control" required placeholder="name@example.com">
        </div>

        <div class="col-md-3">
          <label for="usuario" class="form-label">Usuário</label>
          <input type="text" name="fkusuario" id="usuario" class="form-control">
        </div>

        <div class="col-md-2">
          <label for="senha" class="form-label">Senha</label>
          <div class="input-group">
            <input type="password" class="form-control" id="senha" name="senha" placeholder="senha" aria-label="senha">
            <button type="button" class="btn btn-outline-secondary" id="toggleSenha">
              <i class="bi bi-eye-slash-fill"></i>
            </button>
          </div>
        </div>

        <div class="col-md-2">
          <label for="confirmaSenha" class="form-label">Confirmar Senha</label>
          <div class="input-group">
            <input type="password" class="form-control" id="confirmaSenha" name="confirmaSenha" placeholder="confirmarSenha" aria-label="confirmaSenha">
            <button type="button" class="btn btn-outline-secondary" id="toggleConfirmaSenha">
              <i class="bi bi-eye-slash-fill"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="card-body mt-3">
      <h3>Dados do Aluno</h3>
      <div class="row g-3">
        <div class="col-md-9">
          <label for="nome" class="form-label">Nome</label>
          <input type="text" name="nome" id="nome" class="form-control" required value="<?= $aluno->nome ?? null ?>">
        </div>

        <div class="col-md-3">
          <label for="sexo" class="form-label">Sexo</label>
          <?php $sexo_sel = $aluno->sexo ?? null; ?>
          <select name="sexo" id="sexo" class="form-select" required>
            <option value="">Selecione...</option>
            <option value="M" <?= $sexo_sel === 'M' ? 'selected' : '' ?>>M</option>
            <option value="F" <?= $sexo_sel === 'F' ? 'selected' : '' ?>>F</option>
            <option value="OUTRO" <?= $sexo_sel === 'OUTRO' ? 'selected' : '' ?>>OUTRO</option>
          </select>
        </div>

        <div class="col-md-4">
          <label for="nascimento" class="form-label">Nascimento</label>
          <input type="date" name="nascimento" id="nascimento" class="form-control" value="<?= $aluno->nascimento ?? null ?>">
        </div>

        <div class="col-md-4">
          <label for="celular" class="form-label">Celular</label>
          <input type="text" name="celular" id="celular" class="form-control" value="<?= $aluno->celular ?? null ?>" data-mascara="(00) 00000-0000">
        </div>

        <div class="col-md-4">
          <label for="cep" class="form-label">CEP</label>
          <input type="text" name="cep" id="cep" class="form-control" value="<?= $aluno->cep ?? null ?>" data-mascara="00000-000">
        </div>

        <div class="col-12">
          <label for="logradouro" class="form-label">Logradouro</label>
          <input type="text" name="logradouro" id="logradouro" class="form-control" value="<?= $aluno->logradouro ?? null ?>">
        </div>

        <div class="col-md-4">
          <label for="bairro" class="form-label">Bairro</label>
          <input type="text" name="bairro" id="bairro" class="form-control" value="<?= $aluno->bairro ?? null ?>">
        </div>

        <div class="col-md-4">
          <label for="cidade" class="form-label">Cidade</label>
          <input type="text" name="cidade" id="cidade" class="form-control" value="<?= $aluno->cidade ?? null ?>">
        </div>

        <div class="col-md-4">
          <label for="estado" class="form-label">Estado</label>
          <input type="text" name="estado" id="estado" class="form-control" maxlength="2" value="<?= $aluno->estado ?? null ?>">
        </div>

        <div class="col-12">
          <label for="objetivo" class="form-label">Objetivo</label>
          <textarea name="objetivo" id="objetivo" class="form-control"><?= $aluno->objetivo ?? null ?></textarea>
        </div>

        <div class="col-12 mt-3">
          <a href="alunos.php" class="btn btn-outline-secondary">Voltar</a>
          <button type="submit" id="btnSalvar" class="btn btn-primary" name="btnSalvar">Salvar</button>
        </div>
      </div>
    </div>
  </div>
</form></div>
  </main>
 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/utils.js"></script>
</body>
</html>
