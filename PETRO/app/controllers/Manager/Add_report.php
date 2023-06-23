<?php
class Add_report extends Controller
{
    public $Add_report;
    public function __construct()
    {
        $this->Add_report = $this->model('M_Add_report');
    }

    public function index()
    {
        $data = [
            'id' => $_SESSION['distribution_manager_id'],

        ];

        $this->view('Manager/Add_report');
    }


    public function Add_report()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);


            if (empty($_POST['date'])) {
                $_SESSION['error_message'] = 'Please Enter Date';
                header('location:http://localhost/PETRO/public/Manager/Add_report');
            } elseif (($_POST['reduced92']) < 0) {
                $_SESSION['error_message'] = 'Fuel Price Cannot be Negative';
                header('location:http://localhost/PETRO/public/Manager/Add_report');
            } elseif (($_POST['reduced95']) < 0) {
                $_SESSION['error_message'] = 'Fuel Price Cannot be Negative';
                header('location:http://localhost/PETRO/public/Manager/Add_report');
            } elseif (($_POST['reducedsdl']) < 0) {
                $_SESSION['error_message'] = 'Fuel Price Cannot be Negative';
                header('location:http://localhost/PETRO/public/Manager/Add_report');
            } elseif (($_POST['reducedadl']) < 0) {
                $_SESSION['error_message'] = 'Fuel Price Cannot be Negative';
                header('location:http://localhost/PETRO/public/Manager/Add_report');
            } else {

                $data = [
                    'date' => trim($_POST['date']),
                    'reduced92' => trim($_POST['reduced92']),
                    'reduced95' => trim($_POST['reduced95']),
                    'reducedsdl' => trim($_POST['reducedsdl']),
                    'reducedadl' => trim($_POST['reducedadl']),
                    'err' => '',

                ];
                $_SESSION['date'] = $data['date'];

                if ($this->Add_report->Add_report($data)) {


                    //$this->view(Manager/octane);
                    header('location:http://localhost/PETRO/public/Manager/Report');
                }
            }
        }

        //echo "edcs";

    }
}
