<?php

class userController extends controller
{
    public $userRepository = null;
    private $orderRepository = null;

    // khởi tạo instance
    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new userRepository();
        $this->orderRepository = new OrderRepository();

    }

    //login
        function authenticate()
    {

        if (isset($_COOKIE["save"]) && $_COOKIE["save"]) {
            $_SESSION["login_status"] = true;
            $_SESSION["login_id"] = $_COOKIE["id"];;
            $_SESSION["name"] = $_COOKIE["name_user"];
            $_SESSION["avata"] = $_COOKIE["avt"];
            $_SESSION["user_name"] = $_COOKIE["user_name"];
        }

        if (isVerified()) {
            redirect(BASE);
        }

        if (isset($_POST["name"]) && isset($_POST["pass"])) {
            $users = $this->userRepository
                ->logIn($_POST["name"], $_POST["pass"]);
            foreach ($users as $user) {
                if (!($user->getUsername() && $user->getPassword())) {
                    $this->setError(['alert' =>
                        messenger('Wrong information, Try again!')]);

                    redirect(href('user', 'authenticate'));
                }

                if ($user->getStatus() !== 1) {
                    $this->setError(['alert' =>
                        messenger('You do not have permission to access, Try again!')]);

                    redirect(href('user', 'authenticate'));
                }

                $_SESSION["login_status"] = true;
                $_SESSION["login_id"] = $user->getId();
                $_SESSION["name"] = $user->getName();
                $_SESSION["avata"] = $user->getImage();
                $_SESSION["user_name"] = $user->getUsername();

                if (isset($_POST["save"]) && $_POST["save"] == true) {
                    $time = time() + 84600;
                    setcookie("save", true, $time);
                    setcookie("id", $_SESSION["login_id"], $time);
                    setcookie("name_user", $_SESSION["name"], $time);
                    setcookie("avt", $_SESSION["avata"], $time);
                    setcookie("user_name", $_SESSION["user_name"], $time);
                }
                if(!$_POST['role']){
                    $this->setError(['alert'=>messenger('Please, choose your role')]);
                    redirect(href('user', 'authenticate'));

                }
              //  dd($_POST);

                if ($_POST['role'] == 'Manager' ){
                redirect(BASE);
                }
                if ($_POST['role'] == 'Employee' ){
                    redirect(BASE);
                }


                exit;
            }
        }
        $this->show('view/user/Login', '', 'LayoutLogin');
    }

    //logout
    function logOut()
    {
        session_destroy();
        setcookie('save', false, 0);
        redirect(href('user', 'authenticate'));
    }

    // get all users
    function getAllUsers()
    {
        $list = $this->userRepository->list();
       // dd($list);

        $data = ['list' => $list];
        $this->show('view/user/List', $data);
    }

    // delete user
    function delete()
    {
        if (!isset($_GET['id'])) {
            redirect(href('user', 'getAllUsers'));
        }

        $user = $this->userRepository->delete($_GET['id'], $_SESSION["user_name"]);
        $this->setError(['alert' => $user ?
            messenger('Delete Successfully', 'success') :
            messenger('Delete Failed')]);

        redirect(href('user', 'getAllUsers'));
    }

    // edit user
    function editUser()
    {
        $edit = $this->userRepository->getUserById($_GET['id']);
        $data = ['users' => $edit];

        if (!isset($_GET['id']) && !$_GET['id']) {
            redirect(BASE);
        }

        $this->show('view/user/Edit', $data);
    }

    // save user
    function save()
    {
        if (!isset($_POST['user_name'], $_POST['id'])) {
            redirect(href('user', 'editUser'));
        }

        $users = $this->userRepository->getUserById($_POST['id']);
        foreach ($users as $user) {

            if (!$user) {
                redirect(href('user', 'editUser'));
            }

            $avt = $user->getImage();
            if (isset($_FILES['avt']['error']) && $_FILES['avt']['error'] == 0) {
                $avt = myUpload(
                    $_FILES['avt'] ?? null,
                    $imgMessenger,
                    '../../BookShop/MVC/view/JS/img'
                );
            } else {
                if (!$_POST['avt_2']) {
                    unlink($avt);
                    $avt = '';
                }
            }

            $update = $this->userRepository->update(
                trim($user->getId()),
                trim($_POST['password']),
                trim($_POST['user_name']),
                trim($_POST['name']),
                $avt,
                trim($_POST['email']),
                trim($_POST['gender']),
                trim($_POST['phone']),
                trim($_POST['status'])
            );

            $this->setError(['alert1' => !$update ?
                messenger('Update Faild') :
                messenger('Update Successfully', 'success')]);

            redirect(href('user', 'editUser', ['id' => $user->getId()]));
            $user = $this->userRepository->getUserById($user->getId());
        }
    }

    // history user
    function checkHistory()
    {
        $user = $this->userRepository->checkHistory();
        $this->show('view/user/History', ['list' => $user]);
    }

    // delete forever user
    function deletePermanently()
    {
        $user = $this->userRepository->deletePermanently($_GET['id']);
        $this->setError(['alert' => $user ?
            messenger('Delete Forever Successfully', 'success') :
            messenger('Delete Failed')]);

        redirect(href('user', 'checkHistory'));
    }

    // restore user
    function restore()
    {
        $user = $this->userRepository->restore($_GET['id']);
        $this->setError(['alert' => $user ?
            messenger('Restore Successfully', 'success') :
            messenger('Restore Failed')]);

        redirect(href('user', 'checkHistory'));
    }

    // search user
    function search()
    {
        $user = $this->userRepository->search($_POST['user_name']);
        $this->show('view/user/Search', ['list' => $user]);
    }

    // profile user
    function checkProfile()
    {
          // 1. Get the user ID from the request
          $userId = $_GET['id'];

          // 2. Fetch the user's data
          $user = $this->userRepository->getUserById($userId);
  
          if (empty($user)) {
              // Handle case where user is not found (e.g., redirect to 404 page)
               $this->setError(['alert' => messenger('User not found.', 'danger')]);
              $this->_404();
               return;
          }
  
          // 3. Fetch the user's orders with details
          $orders = $this->orderRepository->getOrdersByUserIdWithDetails($userId);
  
          // 4. Pass the user and orders to the view
          $data = [
              'user' => $user[0],
              'orders' => $orders,
              
  
          ];
          //dd($data);
          $this->show('view/user/profile', $data);
    }

    // add user
    function addNewUser()
    {
        if (isset($_POST['user_name'])) {
            $avt = myUpload(
                $_FILES['avt'] ?? null,
                $imgMessenger,
                '../../BookShop/MVC/view/JS/img'
            );
            $user_name = $_POST['user_name'] ?? '';
            $password = $_POST['password'] ?? '';
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $status = $_POST['status'] ?? '';
            $created_at = $_POST['created_at'] ?? null;
            $updated_at = $_POST['updated_at'] ?? null;
            $gender = $_POST['gender'] ?? null;
            $flag = true;
            $messenger = '';

            if ($password == '') {
                $flag = false;
                $messenger .= 'password must not empty<br>';
            }

            if ($gender == '') {
                $flag = false;
                $messenger .= 'gender must not empty<br>';
            }

            if ($user_name == '') {
                $flag = false;
                $messenger .= 'username must not empty<br>';
            }

            if ($created_at == null) {
                $flag = false;
                $messenger .= 'Need to set time creat_at<br>';
            }

            if ($updated_at == null) {
                $flag = false;
                $messenger .= 'Need to set time update_at<br>';
            }

            if ($status == '') {
                $flag = false;
                $messenger .= 'Status must not empty';
            }

            if ($flag) {
                $create = $this->userRepository
                    ->add(
                        $user_name,
                        $password,
                        $name,
                        $email,
                        $phone,
                        $avt,
                        $status,
                        $created_at,
                        $updated_at,
                        $gender
                    );

                if ($create) {
                    $this->setError(['alert2' =>
                        messenger('User created successfully.', 'success')]);
                } else {
                    $this->setError(['alert2' =>
                        messenger('Failed to create user.')]);

                    redirect(href('user', 'addNewUser'));
                }

            } else {
                $this->setError(['alert2' => messenger($messenger)]);
            }
        }
        $this->show('view/user/Add', '');
    }
}
