<?php

class M_Ordervehicle2 extends Model
{
    protected $table = 'user_form';
    protected $table1='porder';
    protected $table2='max';
    protected $table4='fuel_availability';
    protected $table6='vehicles';
    protected $table5='ordert';
    protected $table7='registered_users';

    public function ordervehicle2($data){
    

        $id = $_SESSION['CUS_id'];
        $fname=$_SESSION['CUS_first_name'];
        
        $result=$this->connection();
        $sql = "select * from $this->table where id='".$id."'";
        $query=$result->query($sql);

        
      


        while($row = $query->fetch_array()){
            $vno1= $row['vno1'];
            $email= $row['email'];
           
            
            $points= $row['points'];
           
          
        }


        $sql0 = "select * from $this->table7 where email='".$email."'";
        $query0=$result->query($sql0);



         if($query0->num_rows>0){
         while($row = $query0->fetch_array()){
            
          
          $phone= $row['phone'];
       
      
         }
         }

        
        $sql22 =  "select * from $this->table6  where status=1 AND vno='".$vno1."'";
        $query22=$result->query($sql22);



         if($query22->num_rows>0){
         while($row = $query22->fetch_array()){
             $vno4= $row['vno'];
             $vtype4 = $row['vtype'];
            $ftype4 = $row['ftype'];
          $phone= $row['phone'];
       
      
         }
         }



        $sql2 = "select * from $this->table2  where id= 1";
        $query2=$result->query($sql2);

        
        while($row = $query2->fetch_array()){
         
            $car = $row['max'];
         
          
          
        }

        
        $sql3 = "select * from $this->table2  where id= 2";
        $query3=$result->query($sql3);

        
        while($row = $query3->fetch_array()){
         
            $van = $row['max'];
         
          
          
        }


        
        $sql4 = "select * from $this->table2  where id= 3";
        $query4=$result->query($sql4);

        
        while($row = $query4->fetch_array()){
         
            $three = $row['max'];
         
          
          
        }

             
        $sql5 = "select * from $this->table2  where id= 4";
        $query5=$result->query($sql5);

        
        while($row = $query5->fetch_array()){
         
            $mc = $row['max'];
         
          
          
        }

             
        $sql6 = "select * from $this->table2  where id= 5";
        $query6=$result->query($sql6);

        
        while($row = $query6->fetch_array()){
         
            $bus = $row['max'];
         
          
          
        }

        $sql60 = "select * from $this->table2  where id= 6";
        $query60=$result->query($sql60);
    
        
        while($row = $query60->fetch_array()){
         
            $heavy = $row['max'];
         
          
          
        }


        $sql7 = "select *from $this->table4 where fuel_type='auto diesel'";
        $query7 = $result->query($sql7);
        while($row = $query7->fetch_array()){
            $price_auto = $row['price'];
            $remain_auto = $row['eligible_amount'];
        }

        $sql8 = "select *from $this->table4 where fuel_type='octane 92'";
        $query8 = $result->query($sql8);
        while($row = $query8->fetch_array()){
            $price_92 = $row['price'];
            $remain_92 = $row['eligible_amount'];
        }

        $sql9 = "select *from $this->table4 where fuel_type='octane 95'";
        $query9 = $result->query($sql9);
        while($row = $query9->fetch_array()){
            $price_95 = $row['price'];
            $remain_95 = $row['eligible_amount'];
        }
        $sql10 = "select *from $this->table4 where fuel_type='super diesel'";
        $query10 = $result->query($sql10);
        while($row = $query10->fetch_array()){
            $price_super = $row['price'];
            $remain_super = $row['eligible_amount'];
        }


        $arr=array(
           
            'email'=>$email,
            'points'=>$points,
            'car'=>$car,
            'van'=>$van,
            'three'=>$three,
            'mc'=>$mc,
            'bus'=>$bus,

            'vno1' => $vno4,
            'vtype1'=>$vtype4,
            'ftype1'=>$ftype4,
            'fname'=>$fname,
            'heavy'=>$heavy,
           
            
            'id'=>$id,


            'price_auto'=> $price_auto,
            'remain_auto'=> $remain_auto,
            'price_92' => $price_92,
            'remain_92' => $remain_92,
            'price_95' => $price_95,
            'remain_95' => $remain_95,
            'price_super' => $price_super,
            'remain_super' => $remain_super,
       
          
        );
        return $arr;
    }
              
            




    
    public function add($data){
        $result1=$this->connection();
        $id =$_SESSION ['CUS_id'];
        $fname=$_SESSION['CUS_first_name'];
      
        $email =$data ['email'];
        $vno =$data ['vno'];
        $vtype =$data ['vtype'];
        $ftype =$data ['ftype'];
        $points =$data ['points'];
        $petropoints =$data ['petropoints'];
        $amount =$data ['amount'];
     
        

      













        $select3 =  "SELECT eligible_amount AS count FROM $this->table4  WHERE fuel_type = '".$ftype."'";
        $query3 = $result1->query($select3);
       


           while($row=$query3->fetch_array()){
               $count2=$row['count'];
           }
       
       
           if($count2<10){

                                      
$sql2 = "select * from $this->table2  where id= 1";
$query2=$result1->query($sql2);


while($row = $query2->fetch_array()){

   $car = $row['max'];

 
 
}


$sql3 = "select * from $this->table2  where id= 2";
$query3=$result1->query($sql3);


while($row = $query3->fetch_array()){

   $van = $row['max'];

 
 
}



$sql4 = "select * from $this->table2  where id= 3";
$query4=$result1->query($sql4);


while($row = $query4->fetch_array()){

   $three = $row['max'];

 
 
}

    
$sql5 = "select * from $this->table2  where id= 4";
$query5=$result1->query($sql5);


while($row = $query5->fetch_array()){

   $mc = $row['max'];

 
 
}

    
$sql6 = "select * from $this->table2  where id= 5";
$query6=$result1->query($sql6);


while($row = $query6->fetch_array()){

   $bus = $row['max'];

 
 
}

$sql60 = "select * from $this->table2  where id= 6";
$query60=$result1->query($sql60);


while($row = $query60->fetch_array()){
 
    $heavy = $row['max'];
 
  
  
}


$sql7 = "select *from $this->table4 where fuel_type='auto diesel'";
$query7 = $result1->query($sql7);
while($row = $query7->fetch_array()){
   $price_auto = $row['price'];
   $remain_auto = $row['eligible_amount'];
}

$sql8 = "select *from $this->table4 where fuel_type='octane 92'";
$query8 = $result1->query($sql8);
while($row = $query8->fetch_array()){
   $price_92 = $row['price'];
   $remain_92 = $row['eligible_amount'];
}

$sql9 = "select *from $this->table4 where fuel_type='octane 95'";
$query9 = $result1->query($sql9);
while($row = $query9->fetch_array()){
   $price_95 = $row['price'];
   $remain_95 = $row['eligible_amount'];
}
$sql10 = "select *from $this->table4 where fuel_type='super diesel'";
$query10 = $result1->query($sql10);
while($row = $query10->fetch_array()){
   $price_super = $row['price'];
   $remain_super = $row['eligible_amount'];
}



$sql30 = "select * from $this->table where id='".$id."'";
$query30=$result1->query($sql30);



if($query30->num_rows>0){
while($row = $query30->fetch_array()){
    $points= $row['points'];
    $vno= $row['vno'];
    $email= $row['email'];


}
}

$sql0 = "select * from $this->table7 where email='".$email."'";
$query0=$result1->query($sql0);



 if($query0->num_rows>0){
 while($row = $query0->fetch_array()){
   
     $phone= $row['phone'];


 }
 }

$sql22 =  "select * from $this->table6  where status=1 AND vno='".$vno."'";
$query22=$result1->query($sql22);



 if($query22->num_rows>0){
 while($row = $query22->fetch_array()){
     $vno4= $row['vno'];
     $vtype4 = $row['vtype'];
    $ftype4 = $row['ftype'];
  $phone= $row['phone'];


 }
 }



               $data=[
                   'vno1' => $vno4,
                   'vtype1'=>$vtype4,
                   'ftype1'=>$ftype4,
                   'email'=>$email,
                   
       
           
                   'points'=>$points,
                   'car'=>$car,
                   'van'=>$van,
                   'three'=>$three,
                   'mc'=>$mc,
                   'bus'=>$bus,
                   'fname'=>$fname,
                   'heavy'=>$heavy,
                  
                   
                   'id'=>$id,
       
       
                   'price_auto'=> $price_auto,
                   'remain_auto'=> $remain_auto,
                   'price_92' => $price_92,
                   'remain_92' => $remain_92,
                   'price_95' => $price_95,
                   'remain_95' => $remain_95,
                   'price_super' => $price_super,
                   'remain_super' => $remain_super,
                   'message'=>"Not enough Fuel to Order",
                  
               ];
               return $data;

           }




         $select2 =  "SELECT COUNT(Oid)AS count FROM $this->table5  WHERE id = '".$id."' AND VMno='".$vno."'";
         $query2 = $result1->query($select2);
        



            while($row=$query2->fetch_array()){
                $count1=$row['count'];
            }
        
        
            if($count1>=1){

                                       
$sql2 = "select * from $this->table2  where id= 1";
$query2=$result1->query($sql2);


while($row = $query2->fetch_array()){
 
    $car = $row['max'];
 
  
  
}


$sql3 = "select * from $this->table2  where id= 2";
$query3=$result1->query($sql3);


while($row = $query3->fetch_array()){
 
    $van = $row['max'];
 
  
  
}



$sql4 = "select * from $this->table2  where id= 3";
$query4=$result1->query($sql4);


while($row = $query4->fetch_array()){
 
    $three = $row['max'];
 
  
  
}

     
$sql5 = "select * from $this->table2  where id= 4";
$query5=$result1->query($sql5);


while($row = $query5->fetch_array()){
 
    $mc = $row['max'];
 
  
  
}

     
$sql6 = "select * from $this->table2  where id= 5";
$query6=$result1->query($sql6);


while($row = $query6->fetch_array()){
 
    $bus = $row['max'];
 
  
  
}


$sql60 = "select * from $this->table2  where id= 6";
$query60=$result1->query($sql60);


while($row = $query60->fetch_array()){
 
    $heavy = $row['max'];
 
  
  
}


$sql7 = "select *from $this->table4 where fuel_type='auto diesel'";
$query7 = $result1->query($sql7);
while($row = $query7->fetch_array()){
    $price_auto = $row['price'];
    $remain_auto = $row['eligible_amount'];
}

$sql8 = "select *from $this->table4 where fuel_type='octane 92'";
$query8 = $result1->query($sql8);
while($row = $query8->fetch_array()){
    $price_92 = $row['price'];
    $remain_92 = $row['eligible_amount'];
}

$sql9 = "select *from $this->table4 where fuel_type='octane 95'";
$query9 = $result1->query($sql9);
while($row = $query9->fetch_array()){
    $price_95 = $row['price'];
    $remain_95 = $row['eligible_amount'];
}
$sql10 = "select *from $this->table4 where fuel_type='super diesel'";
$query10 = $result1->query($sql10);
while($row = $query10->fetch_array()){
    $price_super = $row['price'];
    $remain_super = $row['eligible_amount'];
}

$sql30 = "select * from $this->table where id='".$id."'";
$query30=$result1->query($sql30);



 if($query30->num_rows>0){
 while($row = $query30->fetch_array()){
     $points= $row['points'];
     $vno1= $row['vno1'];
     $email= $row['email'];


 }
 }

 $sql0 = "select * from $this->table7 where email='".$email."'";
 $query0=$result1->query($sql0);



  if($query0->num_rows>0){
  while($row = $query0->fetch_array()){
     
   
   $phone= $row['phone'];


  }
  }

 $sql22 =  "select * from $this->table6  where status=1 AND vno='".$vno1."'";
 $query22=$result1->query($sql22);



  if($query22->num_rows>0){
  while($row = $query22->fetch_array()){
      $vno4= $row['vno'];
      $vtype4 = $row['vtype'];
     $ftype4 = $row['ftype'];
   $phone= $row['phone'];


  }
  }



                $data=[
                    'vno1' => $vno4,
                    'vtype1'=>$vtype4,
                    'ftype1'=>$ftype4,
                    'email'=>$email,
                    
        
            
                    'points'=>$points,
                    'car'=>$car,
                    'van'=>$van,
                    'three'=>$three,
                    'mc'=>$mc,
                    'bus'=>$bus,
                    'fname'=>$fname,
                    'heavy'=>$heavy,
                   
                    
                    'id'=>$id,
        
        
                    'price_auto'=> $price_auto,
                    'remain_auto'=> $remain_auto,
                    'price_92' => $price_92,
                    'remain_92' => $remain_92,
                    'price_95' => $price_95,
                    'remain_95' => $remain_95,
                    'price_super' => $price_super,
                    'remain_super' => $remain_super,
                    'message'=>"You have to complete your previous Order",
                   
                ];
                return $data;

            }

                                
if($amount<=0){


    $sql2 = "select * from $this->table2  where id= 1";
    $query2=$result1->query($sql2);

    
    while($row = $query2->fetch_array()){
     
        $car = $row['max'];
     
      
      
    }

    
    $sql3 = "select * from $this->table2  where id= 2";
    $query3=$result1->query($sql3);

    
    while($row = $query3->fetch_array()){
     
        $van = $row['max'];
     
      
      
    }


    
    $sql4 = "select * from $this->table2  where id= 3";
    $query4=$result1->query($sql4);

    
    while($row = $query4->fetch_array()){
     
        $three = $row['max'];
     
      
      
    }

         
    $sql5 = "select * from $this->table2  where id= 4";
    $query5=$result1->query($sql5);

    
    while($row = $query5->fetch_array()){
     
        $mc = $row['max'];
     
      
      
    }

         
    $sql6 = "select * from $this->table2  where id= 5";
    $query6=$result1->query($sql6);

    
    while($row = $query6->fetch_array()){
     
        $bus = $row['max'];
     
      
      
    }

    $sql60 = "select * from $this->table2  where id= 6";
    $query60=$result1->query($sql60);

    
    while($row = $query60->fetch_array()){
     
        $heavy = $row['max'];
     
      
      
    }


    $sql7 = "select *from $this->table4 where fuel_type='auto diesel'";
    $query7 = $result1->query($sql7);
    while($row = $query7->fetch_array()){
        $price_auto = $row['price'];
        $remain_auto = $row['eligible_amount'];
    }

    $sql8 = "select *from $this->table4 where fuel_type='octane 92'";
    $query8 = $result1->query($sql8);
    while($row = $query8->fetch_array()){
        $price_92 = $row['price'];
        $remain_92 = $row['eligible_amount'];
    }

    $sql9 = "select *from $this->table4 where fuel_type='octane 95'";
    $query9 = $result1->query($sql9);
    while($row = $query9->fetch_array()){
        $price_95 = $row['price'];
        $remain_95 = $row['eligible_amount'];
    }
    $sql10 = "select *from $this->table4 where fuel_type='super diesel'";
    $query10 = $result1->query($sql10);
    while($row = $query10->fetch_array()){
        $price_super = $row['price'];
        $remain_super = $row['eligible_amount'];
    }


    
    $sql30 = "select * from $this->table where id='".$id."'";
    $query30=$result1->query($sql30);



     if($query30->num_rows>0){
     while($row = $query30->fetch_array()){
         $points= $row['points'];
         $vno= $row['vno'];
         $email= $row['email'];
   
  
     }
     }

     $sql0 = "select * from $this->table7 where email='".$email."'";
     $query0=$result1->query($sql0);



      if($query0->num_rows>0){
      while($row = $query0->fetch_array()){
        
          $phone= $row['phone'];
    
   
      }
      }

     $sql22 =  "select * from $this->table6  where status=1 AND vno='".$vno."'";
     $query22=$result1->query($sql22);



      if($query22->num_rows>0){
      while($row = $query22->fetch_array()){
          $vno4= $row['vno'];
          $vtype4 = $row['vtype'];
         $ftype4 = $row['ftype'];
       $phone= $row['phone'];
    
   
      }
      }
                    $data=[
                        'vno' => $vno4,
                        'vtype'=>$vtype4,
                        'ftype'=>$ftype4,
                        'email'=>$email,
                        'fname'=>$fname,
                        
            
                
                        'points'=>$points,
                        'car'=>$car,
                        'van'=>$van,
                        'three'=>$three,
                        'mc'=>$mc,
                        'bus'=>$bus,
                        'fname'=>$fname,
                        'heavy'=>$heavy,
                       
                        
                        'id'=>$id,
            
            
                        'price_auto'=> $price_auto,
                        'remain_auto'=> $remain_auto,
                        'price_92' => $price_92,
                        'remain_92' => $remain_92,
                        'price_95' => $price_95,
                        'remain_95' => $remain_95,
                        'price_super' => $price_super,
                        'remain_super' => $remain_super,
                        'message'=>"You Should enter a positive amount",
                       
                    ];
                    return $data;
                }

                
            else{
        
                $sql = "INSERT INTO $this->table1 (id,email,VMno,vtype,ftype,amount,points,petropoints) VALUES('$id','$email','$vno','$vtype','$ftype','$amount','$points','$petropoints')";
                $query3 = $result1->query($sql); 
                if($query3){
           
                    return 1;
                 }
            
             }
             



            
          

    
     
}
           }
          
          
    






