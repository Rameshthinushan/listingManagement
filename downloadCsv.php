<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="dataStore";

$db = new mysqli($servername, $username, $password,$dbname);

if ($db->connect_error) {

  die("Connection failed: " . $db->connect_error);

}

$sql =  "SELECT JsonData FROM `stocks_1` ORDER BY id DESC LIMIT 1" ;

        $result_1= mysqli_query($db,$sql);

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
       
     $sqlQuery = $query;

    $query = $db->query($sqlQuery); 
 
if($query->num_rows > 0){ 
    $delimiter = ","; 
    $filename = "LowQuantity_" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('Action', 'Itemnumber', 'Title', 'Listingsite', 'Currency', 'Startprice', 'BuyItNowprice', 'Availablequantity','Relationship','Relationshipdetails','Customlabel'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){ 
        //$status = ($row['status'] == 1)?'Active':'Inactive'; 
        $lineData = array($row['Action'], $row['Itemnumber'], $row['Title'], $row['Listingsite'], $row['Currency'], $row['Startprice'], $row['BuyItNowprice'],$row['Availablequantity'],$row['Relationship'],$row['Relationshipdetails'],$row['Customlabel']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
} 
exit; 





?>


