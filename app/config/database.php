<?php
class Databbase{

    private $_HOST = 'localhost';
    private $_DB_NAME = 'app_manager';
    private $_USERNAME = 'root';
    private $_PASSWORD = '';
    private $_DRIVER = 'mysql';
    private $conn;

    public function connect(){
      try {
        $option = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
        ];
        $dsn = $this->_DRIVER.':host='.$this->_HOST.';dbname='.$this->_DB_NAME;
        $this->conn = new PDO($dsn,$this->_USERNAME,$this->_PASSWORD,$option);
        $this->conn->query("SELECT 1");
        return $this->conn;  

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    
}
}

