<?php
session_start();
require_once '../config/database.php';
require_once '../models/AdminModel.php';


$adminModel = new AdminModel(); 
try {
      
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['register-fullname']) && isset($_POST['register-phone']) && isset($_POST['register-email']) && isset($_POST['register-username']) && isset($_POST['register-password']) && isset($_POST['register-repeat'])  ){
            $register_fullname = $_POST['register-fullname'];
            $register_phone = $_POST['register-phone'];
            $register_email = $_POST['register-email'];
            $register_username = $_POST['register-username'];
            $register_password = $_POST['register-password'] ;
            $register_repeat =  $_POST['register-repeat'];
          

            if($register_password == $register_repeat){
                $register_password = password_hash($register_password,PASSWORD_DEFAULT);
                $adminModel->insertRegister($register_fullname,$register_phone,$register_email,$register_username,$register_password);
               
                echo "<script type='text/javascript'>
                alert('Đăng ký thành công');
                window.location.href = 'login.php';
                </script>";
                
            }else{
                $errorPass = 'Mật khẩu nhập lại không đúng';
            }
            
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}   

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tech Service - Register</title>

    <!-- Custom fonts for this template-->
    <link href="../public/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../public/assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../public/assets/css/register.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image">
                    <img style="width:100%; height:100%; object-fit: contain;" src="https://scontent.fdad1-1.fna.fbcdn.net/v/t39.30808-6/431889570_432184595858662_5867845661495252913_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=a5f93a&_nc_eui2=AeGuYHZCZdW9bp3iFK7Y9EFCGTAmHlr64UgZMCYeWvrhSCiJR0HFpJfrhdUsVAvJNTJ6gvFCYL5UyTfXgd-l2t9Q&_nc_ohc=YZAHDa52NL0Q7kNvgHRJVbo&_nc_oc=AdgzVaW0ddFzCHAkfIsf_KnAK6ADlO4LWP-y2vmWOYaACpwO6vVmvrUjJrtsIB3R6I8&_nc_zt=23&_nc_ht=scontent.fdad1-1.fna&_nc_gid=APozaociYniJmKtuE9za82Q&oh=00_AYD-_iAwnseL4EfBAXUmt2QsjU4BvXovr54x4AP-CmqWcw&oe=67B0C135" alt="">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Đăng ký tài khoản</h1>
                            </div>
                            <form class="user" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="register-fullname" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Họ và tên (bắt buộc)" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="register-phone" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Số điện thoại (bắt buộc)" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="register-email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="register-username" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Tài khoản" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="register-password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Mật khẩu" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="register-repeat" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Nhập lại mật khẩu" required>
                                        <label for=""><?php if(isset($errorPass)){echo $errorPass;}?></label>
                                    </div>
                                </div>
                                <input type="submit" value="Đăng ký" class="btn btn-primary btn-user btn-block">
                                    
                                </input>
                                <hr>
                                <a href="index.php" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.php" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.php">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>  
    

    <!-- Bootstrap core JavaScript-->
    <script src="../public/assets/vendor/jquery/jquery.min.js"></script>
    <script src="../public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../public/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../public/assets/js/sb-admin-2.min.js"></script>
    <script src="../public/assets/js/script.js"></script>
</body>

</html>