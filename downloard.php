<?php


 if(isset($_GET['filename'])){

   $fileName = $_GET['filename'] . ".xls";
   header("content-disposition:attachment;filename=\"$fileName\"");
   header("content-Type:application/vnd.ms-excel");

    $conn = mysqli_connect('localhost','root','','dataStore'); 

    $sql =  "SELECT JsonData FROM `stocks_1` ORDER BY id DESC LIMIT 1" ;

        $result_1= mysqli_query($conn,$sql);

        while($row = mysqli_fetch_array($result_1)){

                $allSku = $row['JsonData'];

                $deJeson =json_decode($allSku);

                $Sku = array_column($deJeson,'Sku');

        }

        $query = "SELECT * FROM data WHERE 1 ";

        foreach($Sku as $key =>$skuValue){ 

        if($key == 0 )

        {

                $query .= " AND ";

        }
        $query .= "Relationshipdetails LIKE '%".$skuValue."%'  ";

        if($key+1 !== count($Sku)){

                $query .= " OR ";

            }

        }
        $getQueary = mysqli_query($conn,$query);

        //print_r($getQueary);

        if(mysqli_num_rows($getQueary)>0){
            $heading = false;

        
            while($row = mysqli_fetch_assoc($getQueary)){

               
                if(!$heading){
                    echo implode("\t",array_keys($row)) . "\r\n";
                    $heading = true;
                }
                    echo implode("\t",array_values($row))."\r\n";
            }
        }


        }














