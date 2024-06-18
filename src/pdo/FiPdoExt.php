<?php
namespace Engtuncay\Phputils\pdo;

use PDOException;
use PDO;

/**
 * PdoExtend Helper Class
 *
 * 2024-06-10
 *
 */
class FiPdoExt extends PDO
{
  public $debug = false;
  public $boExecResult;

  /**
   * shows whether or not there is a connection
   * 
   * tr: bağlantı kurulup kurulmadığını gösterir.
   */
  public $boConnection;

  public PDOException $pdoException;

  public function __construct($host, $dbname, $username, $password, $charset = 'utf8')
  {
    try {
      parent::__construct('mysql:host=' . $host . ';dbname=' . $dbname, $username, $password);
      $this->dbName = $dbname;
      $this->query('SET CHARACTER SET ' . $charset);
      $this->query('SET NAMES ' . $charset);
      $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      $this->boConnection = true;
    } catch (PDOException $e) {
      //$this->showError($e);
      $this->boExecResult = false;
      $this->pdoException = $e;
      $this->boConnection = false;
    }
  }

  public function from($tableName)
  {
    $this->sql = 'SELECT * FROM ' . $tableName;
    $this->tableName = $tableName;
    return $this;
  }

  public function select($columns)
  {
    $this->sql = str_replace(' * ', ' ' . $columns . ' ', $this->sql);
    return $this;
  }

  /**
   * Belirtilen tablonun auto_increment değerini ayarlar
   *
   * @param $tableName
   * @return mixed
   */
  public function setAutoIncrement($tableName, $ai = 1)
  {
    return $this->query("ALTER TABLE `{$tableName}` AUTO_INCREMENT = {$ai}")->fetch();
  }


  /**
   * Get the value of boExecResult
   */
  public function getBoExecResult()
  {
    return $this->boExecResult;
  }

  public function getBoExecResultNtn()
  {
    if ($this->boExecResult == null) {
      return false;
    }

    return $this->boExecResult;
  }


  /**
   * Set the value of boExecResult
   *
   * @return  self
   */
  public function setBoExecResult($boExecResult)
  {
    $this->boExecResult = $boExecResult;

    return $this;
  }

  // public function exec($boExecResult)
  // {
  //   $this->boExecResult = $boExecResult;

  //   return $this;
  // }

  /**
   * Execute an SQL statement and return the number of affected rows
   * PDO::exec() executes an SQL statement in a single function call, returning the number of rows affected by the statement.
   *
   * @param string $statement The SQL statement to prepare and execute. Data inside the query should be properly escaped .
   * @return bool|int PDO::exec() returns the number of rows that were modified or deleted by the SQL statement you issued. If no rows were affected, PDO::exec() returns `0`.
   * The following example incorrectly relies on the return value of PDO::exec(), wherein a statement that affected 0 rows results in a call to die():
   */
  public function execFi(string $statement)
  {
    $result = null;

    // if ($this->boConnection == null || $this->boConnection == false) {
    //   echo "connection is not established";
    //   return false;
    // }

    try {
      $result = parent::exec($statement);
      $this->boExecResult = true;
      return $result;
    } catch (PDOException $e) {
      $this->boExecResult = false;
      $this->pdoException = $e;
      return $result;
    }
  }

  public function execFiWitEchoErr(string $statement)
  {
    $result = null;
    try {
      $result = parent::exec($statement);
      $this->boExecResult = true;
      return $result;
    } catch (PDOException $e) {
      $this->boExecResult = false;
      $this->pdoException = $e;
      echo $this->pdoException->getMessage();
      return $result;
    }
  }

  public function getErrorMessage(): string
  {
    if ($this->pdoException != null) {
      return $this->pdoException->getMessage();
    }

    return "";
  }

  public function bindFields($fields)
  {
    end($fields);
    $lastField = key($fields);
    $bindString = ' ';
    foreach ($fields as $field => $data) {
      $bindString .= $field . '=:' . $field;
      $bindString .= ($field === $lastField ? ' ' : ',');
    }
    return $bindString;
  }


}
