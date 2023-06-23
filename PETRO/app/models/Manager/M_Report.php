<?php
    class M_Report extends Model{
        protected $table = 'daily_report';
        public function __construct(){
            $this->pdf=$this->pdf('Download');

        }
        
        public function Report($data){
            $result = $this->connection();
            $date=$_SESSION['date'];
            $sql="select *from $this->table where date='".$date."'";
            $query = $result->query($sql);
            if($query->num_rows>0){
                while($row = $query->fetch_array()){
                    $date = $row['date'];
                    $reduced92 = $row['reduced92'];
                    $complete92 = $row['complete92'];
                    $diff92 = $row['diff92'];
                    $reduced95 = $row['reduced95'];
                    $complete95 = $row['complete95'];
                    $diff95 = $row['diff95'];
                    $reducedSdl = $row['reducedSdl'];
                    $completeSdl = $row['completeSdl'];
                    $diffSdl = $row['diffSdl'];
                    $reducedAdl = $row['reducedAdl'];
                    $completeAdl = $row['completeAdl'];
                    $diffAdl = $row['diffAdl'];
                }
                $arr =array(
                    'date'=> $date,
                    'reduced92' => $reduced92,
                    'complete92' => $complete92,
                    'diff92' => $diff92,
                    'reduced95' => $reduced95,
                    'complete95' => $complete95,
                    'diff95' => $diff95,
                    'reducedSdl' => $reducedSdl,
                    'completeSdl' => $completeSdl,
                    'diffSdl' => $diffSdl,
                    'reducedAdl' => $reducedAdl,
                    'completeAdl' => $completeAdl,
                    'diffAdl' => $diffAdl,
                    'loading'=>'1',
                    'err'=>'',
                );
                return $arr;
    
            }
            else{
                return false;
            }
        }
        public function loading($data){
            $result = $this->connection();
            $date=$_SESSION['date'];
            $sql="select *from $this->table where date='".$date."'";
            $query = $result->query($sql);
            if($query->num_rows>0){
                while($row = $query->fetch_array()){
                    $date = $row['date'];
                    $reduced92 = $row['reduced92'];
                    $complete92 = $row['complete92'];
                    $diff92 = $row['diff92'];
                    $reduced95 = $row['reduced95'];
                    $complete95 = $row['complete95'];
                    $diff95 = $row['diff95'];
                    $reducedSdl = $row['reducedSdl'];
                    $completeSdl = $row['completeSdl'];
                    $diffSdl = $row['diffSdl'];
                    $reducedAdl = $row['reducedAdl'];
                    $completeAdl = $row['completeAdl'];
                    $diffAdl = $row['diffAdl'];
                }
                $data=[
                    'date'=> $date,
                    'reduced92' => $reduced92,
                    'complete92' => $complete92,
                    'diff92' => $diff92,
                    'reduced95' => $reduced95,
                    'complete95' => $complete95,
                    'diff95' => $diff95,
                    'reducedSdl' => $reducedSdl,
                    'completeSdl' => $completeSdl,
                    'diffSdl' => $diffSdl,
                    'reducedAdl' => $reducedAdl,
                    'completeAdl' => $completeAdl,
                    'diffAdl' => $diffAdl,
                    'loading'=>'1',
                    'err'=>'',
                ];
            $check=$this->pdf->second($data);

        }
    }
}
?>