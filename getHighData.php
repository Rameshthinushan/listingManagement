<?php

include "connection.php";


// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname="dataStore";

// // Create connection
// $con = new mysqli($servername, $username, $password,$dbname);

// // Check connection
// if ($con->connect_error) {
//   die("Connection failed: " . $con->connect_error);
// }


$column = array('Action','Itemnumber','Title','Listingsite','Currency','Startprice','BuyItNowprice','Availablequantity','Relationship','Relationshipdetails','Itemnumber','Customlabel','channel');

$query ="SELECT DISTINCT(data.id),data.Action,data.Itemnumber,data.Title,data.Listingsite,data.Currency,data.Startprice,data.

        BuyItNowprice,data.Availablequantity,data.Relationship,data.Relationshipdetails,data.Customlabel,data.channel,stocks.Sku 

        FROM stocks,data WHERE data.Relationshipdetails != stocks.Sku ";

// if(isset($_POST['order']))
// {
//  $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
// }
// else
// {
//  $query .= 'ORDER BY id DESC ';
// }

// $query1 = '';

// if($_POST["length"] != -1)
// {

//  $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];

// }


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

 $data[] = $sub_array;
}

function count_all_data($con)
{
 $query = "SELECT * FROM data";
 return mysqli_num_rows(mysqli_query($con, $query));
}

$output = array(
//  "draw"       =>  intval($_POST["draw"]),
 "recordsTotal"   =>  count_all_data($con),
 "recordsFiltered"  =>  $number_filter_row,
 "data"       =>  $data
);

echo json_encode($output);