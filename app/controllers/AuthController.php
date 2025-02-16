<!-- 
require_once '../controllers/AuthController.php';
class AuthController extends Controller{
    protected $adminModel;
    protected $checkLogin;
    public function __construct() {
        $this->adminModel = new AdminModel;
    }
    public function login(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
              $username = $_POST['login-username'];
              $password = $_POST['login-password'];
          $user = $this->adminModel->checkLogin($username,$password);

          if ($user) {
            // Lưu thông tin người dùng vào session
            $_SESSION['admin_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            // Chuyển hướng về trang quản lý
            header('Location: index.php');
            exit;
        } else{
            echo "123123123123";
        }
        }
    }
} -->
