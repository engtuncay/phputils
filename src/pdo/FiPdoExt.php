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
class FiPdoExt extends \PDO
{
    public $debug = false;

    public function __construct($host, $dbname, $username, $password, $charset = 'utf8')
    {
        try {
            parent::__construct('mysql:host=' . $host . ';dbname=' . $dbname, $username, $password);
            $this->dbName = $dbname;
            $this->query('SET CHARACTER SET ' . $charset);
            $this->query('SET NAMES ' . $charset);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            $this->showError($e);
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

}
