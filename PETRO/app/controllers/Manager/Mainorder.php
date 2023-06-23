<?php

class Mainorder extends Controller
{
    public function __construct()
    {
        $this->mainorder = $this->model('M_Mainorder');
    }
    public function index()
    {
        $data = [];
        $result = ($this->mainorder->mainorder($data));
        if ($result) {
            $this->view('Manager/mainorder', $result);
        } else {
            $data['error'] = "No Records";
            $this->view('Manager/mainorder', $data);
        }
    }

    public function add()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
            $data = [
                'oid' => trim($_POST['oid']),
                'user_id' => trim($_POST['user_id']),
                'pids' => trim($_POST['pids']),
            ];
            $this->mainorder->add($data);
            header('location:http://localhost/PETRO/public/Manager/Mainorder');
        }
    }
}
