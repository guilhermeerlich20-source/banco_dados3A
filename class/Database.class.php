<?php
// Declaração do namespace ou início do arquivo PHP

final class Database {
   // Define a classe Database como final, impedindo herança
   private static $instance = null;
   // Propriedade estática privada para armazenar a instância singleton
   private $connection;
   // Propriedade privada para armazenar a conexão PDO
   
   private function __construct() {
     // Construtor privado para implementar o padrão singleton
     try {
      // Início do bloco try para capturar exceções
      $config = parse_ini_file(__DIR__ . "/../config.ini", true)["database"];
      // Carrega o arquivo de configuração config.ini e obtém a seção 'database'
      $dns = "";
      // Inicializa a variável $dns como string vazia
      if($config["driver"] == "mysql") {
         // Verifica se o driver é MySQL
         $dns = "mysql:host={$config['host']};port={$config['port']};dbname={$config['data']};charset=utf8";
         // Constrói a string DSN para MySQL com host, porta, banco de dados e charset
      } elseif($config["driver"] == "pgsql") {
         // Verifica se o driver é PostgreSQL
         $dns = "pgsql:host={$config['host']};port={$config['port']};dbname={$config['data']};charset=utf8";
         // Constrói a string DSN para PostgreSQL com host, porta, banco de dados e charset
      } else{
         // Caso o driver não seja suportado
         throw new Exception("Driver de base de dados não suportado". $config["driver"] ."");
         // Lança uma exceção com mensagem de erro
      }
      $this->connection = new PDO($dns, $config["user"], $config["pass"]);
      // Cria uma nova instância PDO com DSN, usuário e senha
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // Define o modo de erro do PDO para lançar exceções

     } catch (PDOException $e) {
        // Captura exceções PDO
        error_log("Erro ao conectar com o banco de dados: " . $e->getMessage());
        // Registra o erro no log de erros
        die("Erro ao conectar com o banco de dados. Por favor, tente novamente mais tarde.");
        // Encerra o script com mensagem de erro
     }

   }

   public static function getInstance() {
      // Método estático público para obter a instância singleton
      if (self::$instance === null) {
         // Verifica se a instância ainda não foi criada
         self::$instance = new Database();
         // Cria uma nova instância da classe Database
      }
      return self::$instance;
      // Retorna a instância singleton
   }

   public function getConnection() {
      // Método público para obter a conexão PDO
      return $this->connection;
      // Retorna a propriedade de conexão
   }

}