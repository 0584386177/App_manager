<?php

class Model {
    protected $db;
    protected $conn;
    public function __construct(){
        $this->db = new Databbase;
        $this->conn = $this->db->connect();
        
    }
}