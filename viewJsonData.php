<?php

$conn = mysqli_connect('localhost','root','','dataStore'); 
$chennal = "son sones";
$sql =  "SELECT JsonData FROM `stocks_1` ORDER BY id DESC LIMIT 1" ;

$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)){

        $allSku = $row['JsonData'];

        $deJeson =json_decode($allSku);

        $Sku = array_column($deJeson,'Sku');

}

$query = "SELECT * FROM data WHERE 1 ";

foreach($Sku as $key =>$skuValue){ 

if($key == 0 )

{

        $query .= " AND ( ";

}
$query .= "Relationshipdetails LIKE '%".$skuValue."%'  ";

if($key+1 !== count($Sku)){

        $query .= " OR ";

    }
    if($key+1 == count($Sku)){

        $query .= " ) ";

    }

 }

$query .= " AND channel = '$chennal'  ";

echo $query;
 


