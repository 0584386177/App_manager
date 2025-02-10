<?php
require_once '../models/model.php';
class AdminModel extends Model{

    public function checkLogin($username,$password){
        $query = 'SELECT * FROM admin WHERE username = :username';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username',$username);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if($user && password_verify($password,$user['password'])){
            return $user;
        }else{
            return false;
        }
}
}