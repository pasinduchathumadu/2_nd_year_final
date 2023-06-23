<?php
class Change_Price extends Controller
{
    public $Change_Price;
    public function __construct()
    {
        $this->Change_Price = $this->model('M_Change_Price');
    }

    public function index()
    {

        $data = [
            'id' => $_SESSION['distribution_manager_id'],

        ];
        $result = ($this->Change_Price->price_history($data));
        if ($result) {
            $this->view('Manager/Change_price', $result);
        } else {
            $data['error'] = "No Records";
            $this->view('Manager/Change_price', $data);
        }
    }


    public function change_price($data)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            if (empty($_POST['fuel_type'])) {
                $_SESSION['error_message'] = 'Please Select Fuel Type';
                header('location:http://localhost/PETRO/public/Manager/Change_Price');
            } elseif (empty($_POST['price'])) {
                $_SESSION['error_message'] = 'Please Enter Fuel Price';
                header('location:http://localhost/PETRO/public/Manager/Change_Price');
            } elseif (($_POST['price']) < 0) {
                $_SESSION['error_message'] = 'Fuel Price Cannot be Negative';
                header('location:http://localhost/PETRO/public/Manager/Change_Price');
            } else {

                $data = [
                    'price' => trim($_POST['price']),
                    'fuel_type' => trim($_POST['fuel_type']),

                    'err' => '',

                ];

                if ($this->Change_Price->change_price($data)) {
                    header('location:http://localhost/PETRO/public/Manager/Change_Price');
                    //$this->view(Manager/octane);
                }
            }
        }
        //echo "edcs";

    }
}
