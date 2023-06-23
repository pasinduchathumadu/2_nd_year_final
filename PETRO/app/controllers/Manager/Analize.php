<?php

class Analize extends Controller
{
    public $Analize;
    public function __construct()
    {
        $this->Analize = $this->model('M_Analize');
    }

    public function index()
    {
        $data = [
            'id' => $_SESSION['distribution_manager_id'],
            'fname' => $_SESSION['fuel_first_name'],

        ];
        $this->view('Manager/Analize');
    }

    public function Analize($data)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
            $data = [
                'startDate' => trim($_POST['startDate']),
                'finishDate' => trim($_POST['finishDate']),

                'err' => '',

            ];

            $result = $this->Analize->Analize($data);
            if ($result) {
                $this->view('Manager/Analize', $result);
            }
        }
    }
}
