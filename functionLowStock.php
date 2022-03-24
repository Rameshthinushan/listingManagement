<?phP

$arr_1 = array("Sku" => "Required a bulb?=Yes;No|Shade Diameter=18cm;22cm;26cm","quantity" => 10);

$arr_2 = array("Sku" => "SK0014bvhb","quantity" => 5);

$arr_3 = array("Sku" => "SK0014bvhb","quantity" => 11);

$arr_4 = array("Sku" => "Pack=1|Vintage Bulb=Mushroom Bowl Shape E27","quantity" => 4);

$arr_5 = array("Sku" => "SK0014bvhb","quantity" => 3);

$emt = array();

array_push($emt,$arr_1 , $arr_2 , $arr_3 , $arr_4 , $arr_5);

function calcuate($arrayInput){

$arrayPush = array();

foreach($arrayInput as $index){

   $Quantity = $index['quantity'];

   if($Quantity<10){

       $allVal = $index;

       array_push($arrayPush, $allVal);

        }
   }
$jsonData = json_encode($arrayPush); 

date_default_timezone_set('Asia/Colombo');
  
        $time = date('d-m-y h:i:s');

                $conn = mysqli_connect('localhost','root','','dataStore');

                $sql = "INSERT INTO stocks_1 (updateAt,jsonData) VALUES ('$time','$jsonData')";
        
                if ($conn->query($sql) === TRUE){
        
                     return "New record created successfully";
        
                }else{
        
                     return "Error: " . $sql . "<br>" . $conn->error;
        
                }
        
                $conn->close();
        
          
        

    
   
}


echo calcuate($emt);

