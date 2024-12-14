<?php
// class Authentication extends controller
// {
//     public $userRepository = null;
//     public function __construct()
//     {
//         $this->userRepository = new userRepository();
//     }
//     public function authenticate()
//     {
//         if (isset($_COOKIE["save"]) && $_COOKIE["save"]) {
//             $_SESSION["login_status"] = true;
//             $_SESSION["login_id"] = $_COOKIE["id"];;
//             $_SESSION["name"] = $_COOKIE["name_user"];
//             $_SESSION["avata"] = $_COOKIE["avt"];
//             $_SESSION["user_name"] = $_COOKIE["user_name"];
//         }
//             if (isVerified()) {
//             redirect(BASE);
//         }
//         if (isset($_POST["name"]) && isset($_POST["pass"])) {
//             $users = $this->userRepository->logIn($_POST["name"], $_POST["pass"]);
//             foreach ($users as $user) {
//                 if (!($user->getUsername() && $user->getPassword())) {
//                     $this->setError(['alert' =>  messenger('Wrong information, Try again!')]);
//                     redirect(href('user', 'authenticate'));
//                 }
//                 if ($user->getStatus() !== 1) {
//                     $this->setError(['alert' =>  messenger('You do not have permission to access, Try again!')]);
//                     redirect(href('user', 'authenticate'));
//                 }
//                 $_SESSION["login_status"] = true;
//                 $_SESSION["login_id"] = $user->getId();
//                 $_SESSION["name"] =  $user->getName();
//                 $_SESSION["avata"] =  $user->getImage();
//                 $_SESSION["user_name"] =  $user->getUsername();
//                 if (isset($_POST["save"]) && $_POST["save"] == true) {
//                     $time = time() + 84600;
//                     setcookie("save", true, $time);
//                     setcookie("id", $_SESSION["login_id"], $time);
//                     setcookie("name_user", $_SESSION["name"], $time);
//                     setcookie("avt", $_SESSION["avata"], $time);
//                     setcookie("user_name", $_SESSION["user_name"], $time);
//                 }
//                 //dd($user);
//                 redirect(BASE);
//                 exit;
                
//             }
//         }
//         $this->show('view/user/Login', '', 'LayoutLogin');
//     }

    
//     function logOut()
//     {
//         session_destroy();
//         setcookie('save', false, 0);
//         redirect(href('user', 'authenticate'));
//     }
// }