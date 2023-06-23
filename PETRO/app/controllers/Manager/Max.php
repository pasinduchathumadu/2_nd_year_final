<?php

class Max extends Controller
{

    public $Max;
    public function __construct()
    {
        $this->Max = $this->model('M_Max');
    }
    public function index()
    {
        $data = [
            'id' => $_SESSION['distribution_manager_id'],

        ];
        $result = ($this->Max->Max($data));
        if ($result) {
            $this->view('Manager/Max', $result);
        } else {
            $data['error'] = "No Records";
            $this->view('Manager/Max', $data);
        }
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            // Check if the form input is valid
            if (empty($_POST['vehicle'])) {
                $_SESSION['error_message'] = 'Please Select Fuel Type';
                header('location:http://localhost/PETRO/public/Manager/Update');
            } elseif (empty($_POST['max'])) {
                $_SESSION['error_message'] = 'Please Enter Arrive Amount';
                header('location:http://localhost/PETRO/public/Manager/Update');
            } else {
                $data = [
                    'vehicle' => trim($_POST['vehicle']),
                    'max' => trim($_POST['max']),

                    'err' => "",

                ];

                $result = $this->Max->add($data);
                if ($result) {
                    header('location:http://localhost/PETRO/public/Manager/Max');
                }
            }
        }
    }
}
