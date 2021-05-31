<?php
    class Admin {
        private $db;

        public function __construct(){
            $this->db = new Database; 
        }

        public function login($username, $password){

            $this->db->query("SELECT * FROM admins WHERE username = :username");

     
            $this->db->bind(':username', $username);

            $row = $this->db->single();

            $hashedPassword = $row->password;

          
            if($password == $hashedPassword){
                return $row;
            }else{
                return false;
            }

        }

        public function addAdmins($data){
            $this->db->query("INSERT INTO admins (username, email, password) VALUES (:username, :email, :password)");

   
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);

   
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

  
        public function findAdminByEmail($email){
            $this->db->query("SELECT * FROM admins WHERE email = :email");

            $this->db->bind(':email', $email);

            if($this->db->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }

        public function verrifiedPassword($id, $currentPassword){

            $this->db->query("SELECT * FROM admin_table WHERE id = :id AND password = :currentPassword");

            $this->db->bind(':id', $id);
            $this->db->bind(':password', $currentPassword);

            if($this->db->rowCount() > 0){
                return true;
            }else{
                return false;
            }


        }

        public function updatePassword($data){

            $this->db->query("UPDATE admins SET password = :currentPassword WHERE id = :id");

            $this->db->bind(':id', $id);
            $this->db->bind(':password', $currentPassword);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function getAdmins(){
            $this->db->query("SELECT * FROM admins ORDER BY id ASC");

            $results = $this->db->resultSet();

            return $results;

        }

        public function getUsers(){
            $this->db->query("SELECT * FROM users ORDER BY id ASC");

            $results = $this->db->resultSet();

            return $results;

        }

        public function showCars(){
            $this->db->query("SELECT * FROM cars ORDER BY id ASC");

            $results = $this->db->resultSet();

            return $results;

        }

        // public function addCars($data){
        //     $this->db->query("INSERT INTO cars (title, image_name, active) VALUES (:title, :image_name, :active)");

        //     $this->db->bind(':title', $data['title']);
        //     $this->db->bind(':image_name', $data['image_name']);
        //     $this->db->bind(':avtive', $data['active']);

        //     if($this->db->execute()){
        //         return true;
        //     }else{
        //         return false;
        //     }
        // }

        public function addCars($title,$price,$active,$image,$tmp){


           
            $this->db->query("INSERT INTO cars (title, price, image_name, active ) VALUES ($title, $price, $image, $active)");
                   $this->db->bind(':title', $data['title']);
                   $this->db->bind(':image_name', $data['image_name']);
                $this->db->bind(':avtive', $data['active']);
                if($this->db->execute()){
                             return true;
                         }else{
                             return false;
                         }

        }

        public function showReservation(){
            $this->db->query("SELECT * FROM reserv ORDER BY id ASC");

            $results = $this->db->resultSet();

            return $results;
        }

    }