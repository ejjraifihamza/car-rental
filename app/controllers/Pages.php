<?php
class Pages extends Controller {
    public function __construct(){
        $this->adminModel = $this->model('Admin');
    }
    

    public function index(){

        $cars = $this->adminModel->showCars();

            $data = [
                'cars' => $cars
            ];

        $this->view('pages/index', $data);
    }

    public function about(){
        $this->view('pages/about');
    }
    public function contact(){
        $this->view('pages/contact');
    }

    public function cars(){

        $cars = $this->adminModel->showCars();

            $data = [
                'cars' => $cars
            ];
            
        $this->view('pages/cars', $data);
    }
    

}