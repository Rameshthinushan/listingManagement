<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname="dataStore";

$con = new mysqli($servername, $username, $password,$dbname);

if ($con->connect_error) {

  die("Connection failed: " . $con->connect_error);

}

$quantity = $_POST['Qnt'];

$Channel = $_POST['Chan'];

$column = array('Action','Itemnumber','Title','Listingsite','Currency','Startprice','BuyItNowprice','Availablequantity','Relationship','Relationshipdetails','Itemnumber','Customlabel','channel');


$query =" SELECT * FROM data WHERE 1 ";   



if($quantity != ""){

$sql =  "SELECT JsonData FROM `stocks_1` ORDER BY id DESC LIMIT 1" ;

$result_1 = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result_1)){

        $allSku = $row['JsonData'];

        $deJeson =json_decode($allSku);

        $Sku = array_column($deJeson,'Sku');

}


foreach($Sku as $key =>$skuValue){ 

if($key == 0 )

{

        $query .= " AND ( ";

}

if($quantity == "lowQuantity" ){

    $query .= "Relationshipdetails LIKE '%".$skuValue."%'  ";

}else if($quantity == "Others"){

    $query .= "Relationshipdetails NOT LIKE '%".$skuValue."%'  ";

}


if($key+1 !== count($Sku)){

        $query .= " OR ";

    }
    if($key+1 == count($Sku)){

        $query .= " ) ";

    }

   
 }

  


}
if($Channel != ""){

    $query .= " AND channel = '$Channel'  ";

}



$number_filter_row = mysqli_num_rows(mysqli_query($con, $query));

$result = mysqli_query($con, $query);


$data = array();

while($row = mysqli_fetch_array($result))
{

 $sub_array = array();
 $sub_array[] = $row['Action'];
 $sub_array[] = $row['Itemnumber'];
 $sub_array[] = $row['Title'];
 $sub_array[] = $row['Listingsite'];
 $sub_array[] = $row['Currency'];
 $sub_array[] = $row['Startprice'];
 $sub_array[] = $row['BuyItNowprice'];
 $sub_array[] = $row['Availablequantity'];
 $sub_array[] = $row['Relationship'];
 $sub_array[] = $row['Relationshipdetails'];
 $sub_array[] = $row['Customlabel'];
 $sub_array[] = $row['channel'];

$sub_array[] = $query;
 $data[] = $sub_array;

}

function count_all_data($con)
{

 $query = "SELECT * FROM data";

 return mysqli_num_rows(mysqli_query($con, $query));
 
}

$output = array(
 "recordsTotal"   =>  count_all_data($con),
 "recordsFiltered"  =>  $number_filter_row,
 "data"       =>  $data
);

echo json_encode($output);

?>


