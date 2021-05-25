<?php
    class Admins extends Controller {
        public function __construct(){
            $this->adminModel = $this->model('Admin');
        }

        public function login(){ 
            
            $data = [
                'title' => 'admin login page',
                'username' => '',
                'password' => '',
                'usernameError' => '',
                'passwordError' => ''
            ];

            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
              
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'username' => trim($_POST['username']),
                    'password' => trim($_POST['password']),
                    'usernameError' => '',
                    'passwordError' => ''
                ];


                if(empty($data['username'])){
                    $data['usernameError'] = 'Please enter a username.';
                }

        
                if(empty($data['password'])){
                    $data['passwordError'] = 'Please enter a password.';
                }
                
            
                if(empty($data['usernameError']) && empty($data['passwordError'])){
                    $loggedInAdmin = $this->adminModel->login($data['username'], $data['password']);

                    if($loggedInAdmin){
                        $this->createAdminSession($loggedInAdmin);
                    }else{
                        $data['passwordError'] = 'username or Password is incorrect, pleaze try again.';
                    }
                }

            }else{
                $data = [
                    'username' => '',
                    'password' => '',
                    'usernameError' => '',
                    'passwordError' => ''
                ];
            }


            $this->view('admins/login', $data);
        }

        public function createAdminSession($user){
            $_SESSION['loginAdmin'] = "<div class='success1'>
                                            <span>Login Successfully</span>
                                            <img src='../public/img/success.png'>
                                        </div>";
            $_SESSION['user_id'] = $user->id;
            $_SESSION['username'] = $user->username;
            $_SESSION['email'] = $user->email;
            header('location:' . URLROOT . '/admins/index');
        }

        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['username']);
            unset($_SESSION['email']);
            header('location:' . URLROOT . '/admins/login');
        }

        public function index(){
            $this->view('admins/index');
        }

        public function manageAdmins(){

            $admins = $this->adminModel->getAdmins();

            $data = [
                'admins' => $admins
            ];


            $this->view('admins/manageAdmins', $data);
        }

        public function deleteAdmins(){
            $this->view('admins/deleteAdmins');
        }

        public function manageCars(){

            $cars = $this->adminModel->showCars();

            $data = [
                'cars' => $cars
            ];

            $this->view('admins/manageCars', $data);
        }

        public function updatePassword(){

            $data = [
                'id' => '',
                'currentPassword' => '',
                'newPassword' => '',
                'confirmPassword' => ''
            ];

            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'id' => $_GET['id'],
                    'currentPassword' => trim($_POST['currentPassword']),
                    'newPassword' => trim($_POST['newPassword']),
                    'confirmPassword' => trim($_POST['confirmPassword'])
                ];

                if($data['password'] = $data['confirmPassword']){
                    
                        $this->adminModel->updatePassword($data);
                    
                }

                }
                
                $this->view('admins/updatePassword', $data);
            }


        public function updateAdmin(){
            $this->view('admins/updateAdmin');
        }
        public function deleteAdmin(){
            $this->view('admins/deleteAdmin');
        }
        public function deleteCars(){
            $this->view('admins/deleteCars');
        }
        public function addCars(){

            $data = [
                'title' => '',
                'price' => '',
                'active' => '',
                'image_name' => '',
                'source_path' => ''
                ];

                if(isset($_REQUEST['submit'])){


                // $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); // stripping or encoding unwanted character

                $data = [
                    'title' => $_POST['title'],
                    'price' => $_POST['price'],
                    'active' => $_POST['active'],
                    'image_name' => $_FILES['image_name']['name'],
                    'source_path' => $_FILES['image_name']['tmp_name'],
                    // 'distination_path' => ''
                    ];

                // $title = $_POST['title'];

                // $price = $_POST['price'];

                // $active = $_POST['active'];

                if(isset($_FILES['image_name']['name'])){

                $image_name = $_FILES['image_name']['name'];

                // $ext = end(explode('.', $image_name));

                $ext = explode('.', $image_name);

                $file_extension = end($ext);
                
                $data['image_name'] = "car_".rand(000, 999).'.'.$file_extension;

                // $data['image_name'] = $image_name;

                
                // $source_path = $_FILES['image_name']['tmp_name'];

                $distination_path = "../up-img/".$image_name;

                $move = move_uploaded_file($data['source_path'], $distination_path);

                
                
                if($move == true){
                    $this->adminModel->addCars($data);
                }
            }


          }
            

            $this->view('admins/addCars', $data);
        }

        public function addAdmins(){

            $data = [
                'username' => '',
                'email' => '',
                'password' => '',
                'confirmPassword' => '',
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'username' => trim($_POST['username']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirmPassword' => trim($_POST['confirmPassword']),
                    'usernameError' => '',
                    'emailError' => '',
                    'passwordError' => '',
                    'confirmPasswordError' => ''
                ];

                $nameValidation = "/^[a-zA-Z0-9]*$/";
                $passwordValidation = '/^(.{0,7}|[^a-z]*|[^\d]*)$/i';

                
                if (empty($data['username'])) {
                    $data['usernameError'] = 'Please enter username.';
                } elseif (!preg_match($nameValidation, $data['username'])) {
                    $data['usernameError'] = 'Name can only contain letters and numbers.';
                }

                if(empty($data['email'])){
                    $data['emailError'] = 'Please enter email address.';
                }elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                    $data['emailError'] = 'Please enter correct email address.';
                }else {
          
                    if($this->adminModel->findAdminByEmail($data['email'])){
                        $data['emailError'] = 'Email is already taken.';
                    }
                }

                
                if(empty($data['password'])){
                    $data['passwordError'] = 'Please enter password.';
                }elseif (strlen($data['password']) < 6) {
                    $data['passwordError'] = "Password can't be less than 8 characters.";
                }elseif(preg_match($passwordValidation, $data['password'])){
                    $data['passwordError'] = 'Password must have at least one numeric value.';
                }

                
                if(empty($data['confirmPassword'])){
                    $data['confirmPasswordError'] = 'Please enter password.';
                }else{
                    if($data['password'] != $data['confirmPassword']){
                        $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
                    }
                }

                
                if (empty($data['usernameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])){

                   
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            
                    if($this->adminModel->addAdmins($data)){ 
                        $_SESSION['add'] = "<div class='success1'>
                                                <span>Admin added Successfully</span>
                                                <img src='../public/img/success.png'>
                                            </div>";
                      
                        header('location:' . URLROOT . '/admins/manageAdmins');
                    }else{
                        die('Somthing went wrong.');
                    }
                }
            }

            $this->view('admins/addAdmins', $data);
        }

        public function reservation(){

            $reservation = $this->adminModel->showReservation();

            $data = [
                'reservation' => $reservation
            ];


            $this->view('admins/reservation', $data);
        }

        public function manageUser(){

            $users = $this->adminModel->getUsers();

            $data = [
                'users' => $users
            ];
            
            $this->view('admins/manageUser', $data);
        }

        public function deleteUser(){
            $this->view('admins/deleteUser');
        }
        
    }