<?php
    class User {
        private $db;

        public function __construct(){
            $this->db = new Database; 
        }

        public function register($data){
            $this->db->query("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");


            $this->db->bind(':username', $data['username']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);


            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function login($username, $password){
            $this->db->query("SELECT * FROM users WHERE username = :username");

            $this->db->bind(':username', $username);

            $row = $this->db->single();

            $hashedPassword = $row->password;

            if(password_verify($password, $hashedPassword)){
                return $row;
            }else{
                return false;
            }
        }


        public function findUserByEmail($email){
            $this->db->query("SELECT * FROM users WHERE email = :email");

            $this->db->bind(':email', $email);

            if($this->db->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }

        public function makeReservation($data){
            $this->db->query("INSERT INTO reservation (user_email, car_name, date_between) VALUES (:user_email, :car_name, :date_between)");

            $this->db->bind(':user_email', $data['user_email']);
            $this->db->bind(':car_name', $data['car_name']);
            $this->db->bind(':date_between', $data['date_between']);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function reserv($data){
            $this->db->query("INSERT INTO reserv (user_email, car_name, begin, finish) VALUES (:user_email, :car_name, :begin, :finish)");

            $this->db->bind(':user_email', $data['user_email']);
            $this->db->bind(':car_name', $data['car_name']);
            $this->db->bind(':begin', $data['begin']);
            $this->db->bind(':finish', $data['finish']);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

    }