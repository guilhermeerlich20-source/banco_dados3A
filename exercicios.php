
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Exercícios</title>
</head>
<body>
  <?php 
  require_once "_parts/_menu.php";
  
   spl_autoload_register(function($class){
      require_once "class/{$class}.class.php";
   });

   $exercicio = new Exercicio();

$exercicios = $exercicio->all();
  ?>


<main class="container">
 <div class="mt-5 d-flex justify-content-between p-5">
    <h1>Exercícios</h1>
    <a href="ger-exercicio.php" class="btn btn-success">Novo Exercício</a>
 </div>

 <div class="mt-4">
   <div class="mb-3">
      <input type="text" name="campo-filtro" id="campo-filtro" class="form-control" placeholder="🔍 Digite para filtrar" title="Digite para filtrar pelo nome o exercicio">
     </div>
     <table class="table table-hover" id="tabela-exercicios">
       <thead>
         <tr class="table-dark " >
           <th class="text-center">#</th>
           <th >Nome</th>
           <th class="text-center">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php 
     foreach ($exercicios as $ex):
     ?>
       <tr>
         <td class="text-center"><?= $ex->idexercicio ?></td>
         
         <td><?php echo $ex->nome; ?></td>

         <!-- Botões editar excluir -->
         <td class="text-center d-flex gap-1 justify-content-center">
          <a href="#" class="btn btn-sm btn-secondary" ><i class="bi bi-eye"></i></a>
          <a href="ger-exercicio.php?id=<?= $ex->idexercicio ?>" class="btn btn-sm btn-success" ><i class="bi bi-pencil-square"></i></a>
          <!-- botão excluir -->
          <form action="db-exercicio.php" method="post" >
            <input type="hidden" name="id" value="<?= $ex->idexercicio ?>">
            <button type="submit" name="btnExcluir" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este exercício?');">
              <i class="bi bi-trash"></i>
            </button>
          </form>
        </td>

      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  
  <div id="msg-vazio" class="d-flex justify-content-center alert alert-info p-3 d-none">
    ℹ️ Nenhum exercício encontrado para o filtro digitado.
  </div>
</div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/tb-interativa.js"></script>
<script src="js/exercicios.js"></script>
</body>
</html>

