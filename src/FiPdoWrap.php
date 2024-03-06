<?php
namespace Engtuncay\Phputils;

use PDOException;
use PDO;

class FiPdoWrap
{
  // Props
  private $dbConfig = array(
    'host' => null,
    'name' => null,
    'user' => null,
    'pass' => null,
    'pdo' => null
  );
  public $pdo;
  public $error;

  //
  // CONFIG
  private function buildPDO()
  {
    $this->pdo = new PDO(
      'mysql:host=' . $this->dbConfig['host'] . ';' .
      'dbname=' . $this->dbConfig['name'],
      $this->dbConfig['user'],
      $this->dbConfig['pass']
    );
  }
  function __construct($host, $dbName, $user, $pass, $charset = 'utf8')
  {
    $connString = 'mysql:host=' . $host . ';' . 'dbname=' . $dbName;

    $options = array(
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

    // Create a new PDO instanace
    try {
      $this->pdo = new PDO($connString, $user, $pass, $options);
      // tek tek ayarlamak istenirse
      //$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //$this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      $this->pdo->query('SET CHARACTER SET ' . $charset);
      $this->pdo->query('SET NAMES ' . $charset);
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
    }

    // $this->dbConfig['host'] = $host;
    // $this->dbConfig['name'] = $dbName;
    // $this->dbConfig['user'] = $user;
    // $this->dbConfig['pass'] = $pass;
    // $this->buildPDO();
  }





  public function setConfig($args)
  {
    // $keys = array_keys($db);
    // foreach ($keys as $key)
    //   if (isset($args[$key]))
    //     $this->dbConfig[$key] = $args[$key];
    // $this->buildPDO();
  }

  //
  // INSERT
  private function insert($table, $columns, $rowdicts)
  {
    // columns = array of row columns
    // rowdicts = array of dictionaries
    $placeholders = '';

    foreach ($columns as $column)
      $placeholders = $placeholders . $column . ' = ?, ';
    $placeholders = substr($placeholders, 0, -2);

    $stmt = $this->pdo->prepare('INSERT INTO ' . $table . ' SET ' . $placeholders);
    foreach ($rowdicts as $rowdict) {
      $vcount = 0;
      foreach ($rowdict as $value) {
        $vcount++;
        $stmt->bindValue($vcount, $value);
      }
      $stmt->execute();
    }
  }
  public function insertRows($table, $rowdicts)
  {
    $columns = array_keys($rowdicts[0]);
    $this->insert($table, $columns, $rowdicts);
  }
  public function insertRow($table, $rowdict)
  {
    $columns = array_keys($rowdict);
    $this->insert($table, $columns, array($rowdict));
  }

  // public function getDbConfig(): null
  // {
  //   return $this->dbConfig;
  // }

  public function getPdo(): PDO
  {
    return $this->pdo;
  }

  public function getError() //: null
  {
    return $this->error;
  }

}


// $db = new PDOwrapper( 'localhost', 'practice','root','root' );

// $db->insertRow( 'Posts', array( 'title' => 'FINGERS CROSSED', 'content' => 'HMMMMMMMMMM' ) );
// $db->insertRows( 'Posts', array(
// 	array( 'title' => 'FINGERS CROSSED AGAIN', 'content' => 'HRMMM' ),
// 	array( 'title' => 'OH BOY GOSH', 'content' => 'GEEEEEEEEE' ),
// 	array( 'title' => 'I LIKE TURTLES', 'content' => 'TEE HEEEEEEEE' )
// ) ); 


?>