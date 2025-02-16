<?php
require_once '../models/model.php';
class AdminModel extends Model{

    public function checkLogin($username,$password){
        $query = 'SELECT * FROM admin WHERE username = :username AND password = :password';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username',$username);
        $stmt->bindParam(':password',$password);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if($user>0){
            return $user['role'];
        }else{
            return null;
        }
}
    public function insertRegister($register_fullname,$register_phone, $register_email,$register_username,$register_password){
        try {
            $query = 'INSERT INTO register (fullname,phone,email,username,password) VALUES (:fullname,:phone,:email,:username,:password)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':fullname',$register_fullname);
        $stmt->bindParam(':phone',$register_phone);
        $stmt->bindParam(':email',$register_email);
        $stmt->bindParam(':username',$register_username);
        $stmt->bindParam(':password',$register_password);
        if($stmt->execute()){
            $insertUser = 'INSERT INTO admin(username,phone,fullname,email,password) SELECT username ,phone, fullname,email,password FROM register WHERE email = :email'; 
            $stmt = $this->conn->prepare($insertUser);
            $stmt->bindParam(':email',$register_email);
            $stmt->execute();
            
            
        }
        } catch (Exception $e) {
           echo $e->getMessage();
        }
        
        
    }
}