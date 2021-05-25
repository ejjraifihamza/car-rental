<?php
    class Users extends Controller{
        public function __construct(){
            $this->userModel = $this->model('User');
        }

        public function register(){
            $data = [
                'username' => '',
                'email' => '',
                'password' => '',
                'confirPassword' => '',
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                
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

                $nameValidation = "/^[a-zA-Z0-9]{6,12}$/";
                $passwordValidation = '/^(.{0,7}|[^a-z]*|[^\d]*)$/i';
                
                if (empty($data['username'])) {
                    $data['usernameError'] = 'Please enter username.';
                } elseif (!preg_match($nameValidation, $data['username'])) {
                    $data['usernameError'] = 'Name can only contain letters and numbers and {6,12}.';
                }
                
                if(empty($data['email'])){
                    $data['emailError'] = 'Please enter email address.';
                }elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                    $data['emailError'] = 'Please enter correct email address.';
                }else {
                    
                    if($this->userModel->findUserByEmail($data['email'])){ 
                        $data['emailError'] = 'Email is already taken.';
                    }
                }

                
                if(empty($data['password'])){
                    $data['passwordError'] = 'Please enter password.';
                }elseif (strlen($data['password']) < 6) {
                    $data['passwordError'] = "Password can't be less than 6 characters.";
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

                    
                    if($this->userModel->register($data)){ 
                        $_SESSION['register'] = "<div class='success1'>
                                                    <span>Registed Successfully</span>
                                                    <img src='../public/img/success.png'>
                                                </div>";
                        header('location:' . URLROOT . '/users/login');
                    }else{
                        die('Somthing went wrong.');
                    }
                }

            }

            $this->view('users/register', $data);
        }

        public function login(){
            $data = [
                'title' => 'login page',
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
                    $loggedInUser = $this->userModel->login($data['username'], $data['password']); //this login method creat it insid a models/user.php

                    if($loggedInUser){
                        $this->createUserSession($loggedInUser);
                    }else{
                        $data['passwordError'] = 'username or Password is incorrect, please try again.';
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

            $this->view('users/login', $data);
        }

            public function createUserSession($user){
                $_SESSION['login'] = "<div class='success1'>
                                        <span>Login Successfully</span>
                                        <img src='../public/img/success.png'>
                                      </div>";
                $_SESSION['user_id'] = $user->id;
                $_SESSION['username'] = $user->username;
                $_SESSION['email'] = $user->email;
                header('location:' . URLROOT . '/pages/index');
            }
            
            public function logout(){
                unset($_SESSION['user_id']);
                unset($_SESSION['username']);
                unset($_SESSION['email']);
                header('location:' . URLROOT . '/users/login');
            }

            public function reservation(){

                $data = [
                    'user_email' => '',
                    'car_name' => '',
                    'date_between' => '',
                    'emailError' => '',
                    'carError' => '',
                    'dateError' => ''
                ];

                if($_SERVER['REQUEST_METHOD'] == 'POST'){

                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                    $data = [
                        'user_email' => trim($_POST['user_email']),
                        'car_name' => trim($_POST['car_name']),
                        'date_between' => trim($_POST['date_between']),
                        'emailError' => '',
                        'carError' => '',
                        'dateError' => ''
                    ];

                    if(empty($data['user_email'])){
                        $data['emailError'] = 'Please enter a email.';
                    }
                    

                    if(empty($data['car_name'])){
                        $data['carError'] = 'Please enter a car name.';
                    }

                    if(empty($data['date_between'])){
                        $data['dateError'] = 'Please enter a date.';
                    }

                    if(empty($data['emailError']) && empty($data['carError']) && empty($data['dateError'])){
                        $reservationDone = $this->userModel->makeReservation($data);
                        if($reservationDone){
                            $_SESSION['reservation'] = "<div class='success1'>
                                                            <span>reservation added Successfully</span>
                                                            <img src='../public/img/success.png'>
                                                        </div>";
                            header('location:' . URLROOT . '/pages/index');
                        }else{
                            $data['dateError'] = 'Somthing wrong please try again.';
                            header('location:' . URLROOT . '/pages/index');
                        }
                    }

                }

                $this->view('users/reservation', $data);
            }
    }