<?php
//use Dompdf\Dompdf;
class Report extends Controller{
    public $Report;
    public function __construct(){
        $this->Report=$this->model('M_Report');
    }

    public function index(){

        $data=[
            'date'=>$_SESSION['date'],
            'id'=> $_SESSION['distribution_manager_id'],
        ];

        $result=($this->Report->Report($data));
        if($result){
            $this->view('Manager/Report',$result);
        }
        else{
            $this->view('Manager/Report',$data);
        }

        /*require 'vendor/autoload.php';

        // reference the Dompdf namespace
        

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml('hello world');

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();*/
        
    }
    public function download(){
        $data=[
            'download'=>1,
        ];
        $result = $this->Report->loading($data);

    }
    

}