<?php

class Update extends Controller
{
    public $Update;
    public function __construct()
    {
        $this->Update = $this->model('M_Update');
    }

    public function index()
    {
        $data = [
            'id' => $_SESSION['distribution_manager_id'],

        ];

        $result = ($this->Update->update_fuel($data));
        if ($result) {
            $this->view('Manager/Update', $result);
        } else {
            $this->view('Manager/Update', $data);
        }
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            // Check if the form input is valid
            if (empty($_POST['fuel_type'])) {
                $_SESSION['error_message'] = 'Please Select Fuel Type';
                header('location:http://localhost/PETRO/public/Manager/Update');
            } elseif (empty($_POST['arrive_amount'])) {
                $_SESSION['error_message'] = 'Please Enter Arrive Amount';
                header('location:http://localhost/PETRO/public/Manager/Update');
            } elseif (($_POST['arrive_amount']) < 0) {
                $_SESSION['error_message'] = 'Arrive Fuel Amount Cannot be Negative';
                header('location:http://localhost/PETRO/public/Manager/Update');
            } elseif (empty($_POST['buying_price'])) {
                $_SESSION['error_message'] = 'Please Enter Buying Price';
                header('location:http://localhost/PETRO/public/Manager/Update');
            } elseif (($_POST['buying_price']) < 0) {
                $_SESSION['error_message'] = 'Buying Price Cannot be Negative';
                header('location:http://localhost/PETRO/public/Manager/Update');
            } else {
                $data = [
                    'fuel_type' => trim($_POST['fuel_type']),
                    'arrive_amount' => trim($_POST['arrive_amount']),
                    'buying_price' => trim($_POST['buying_price']),
                    'err' => "",

                ];

                $result = $this->Update->add($data);
                if ($result) {
                    header('location:http://localhost/PETRO/public/Manager/Update');
                } else {
                }
            }
        }
    }
}
