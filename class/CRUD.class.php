<?php
/**
 * Classe abstrata CRUD
 * 
 * Fornece uma base para operações básicas de banco de dados (Create, Read, Update, Delete).
 * As classes filhas devem implementar os métodos abstratos add() e update().
 */

/**
 * @var string $table
 * Nome da tabela do banco de dados associada à classe
 */

/**
 * @var PDO $db
 * Instância da conexão PDO com o banco de dados
 */

/**
 * __construct()
 * 
 * Construtor da classe
 * Inicializa a propriedade $db obtendo a conexão com o banco de dados
 * através da classe Database (Singleton pattern)
 */

/**
 * add()
 * 
 * Método abstrato que DEVE ser implementado pelas classes filhas
 * Responsável pela criação (inserção) de novos registros no banco de dados
 * 
 * @abstract
 */

/**
 * update()
 * 
 * Método abstrato que DEVE ser implementado pelas classes filhas
 * Responsável pela atualização (edição) de registros existentes no banco de dados
 * 
 * @abstract
 */

/**
 * all()
 * 
 * Recupera todos os registros da tabela associada
 * 
 * @return array|false
 *         Retorna um array de objetos (PDO::FETCH_OBJ) com todos os registros
 *         ou false se nenhum registro for encontrado
 */

abstract class CRUD {
   protected $table;
   protected $db;

   public function __construct() {
      $this->db = Database::getInstance()->getConnection();
      }
      //    construa dois metodos abstratos um add e o outro update, para que as classes filhas sejam obrigadas a implementar esses metodos.
      abstract public function add();
      abstract public function update();

      public function all(){
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
      }
}