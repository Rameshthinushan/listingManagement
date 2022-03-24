<?php

$con = mysqli_connect("localhost","root","","dataStore");

?>

<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
            .box {
                background-color: lightgrey;
                width: 400px;
                border: 8px solid ;
                padding: 50px;
                margin: 20px;
                margin-left :575px;
            }
            body{
                background-color : blanchedalmond;
            }
            .dropbtn {
                background-color: #4CAF50;
                color: white;
                padding: 9px;
                font-size: 16px;
                border: none;
                cursor: pointer;
                border-radius : 5px;
                }

                .dropdown {
                position: relative;
                display: inline-block;
                }

                .dropdown-content {
                display: none;
                position: absolute;
                background-color: #f9f9f9;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
                }

                .dropdown-content a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
                }

                .dropdown-content a:hover {background-color: #f1f1f1}

                .dropdown:hover .dropdown-content {
                display: block;
                }

                .dropdown:hover .dropbtn {
                background-color: #3e8e41;
                }

                h1{
                    margin-top: 50px;
                }
    </style>
  </head>
  <body>
    <U><h1 align = "center">lISTING MANAGEMENT</h1> <br><br></U>

    <div class="box">

    <U><h3 align = "center">Listings</h3> <br><br></U>

    <form action="" method ="POST" enctype="multipart/form-data"> 

        <label for="Channel"> Channel </label>

        <select id="Channel" name = "Channel">
       
            <option value=""></option>

            <option value="led son">LED SONES</option>

            <option value="son sones">SON SONES</option>
            
            <option value="eletrical sones">ELETRICAL SONES</option>

        </select><BR></BR>

        <input type="file" name="file" require = "require"><BR></BR>

        <input class="btn btn-primary" type="submit" name="Upload" value="Upload"/>

        <a class="btn btn-success" href="csvView.php" role="button">View All</a>

        
        </div>

        <?php
            if(isset($_POST['Upload'])){

                $channel_1 = $_POST['Channel'];

                if(empty($channel_1)){

                    echo "Please Select Your channel!";

                }else{

                    if($con){

                            $file = $_FILES['file']['tmp_name'];
                            
                            $handel = fopen($file,"r");

                            $i = 3;

                            while(($cont = fgetcsv($handel , 10000000 , "," ))!== false)

                            {
                                $channel = $_POST['Channel'];

                                //$table =rtrim( $_FILES['file']['name'],".csv");


                                        $action = $cont[0];

                                        $itemNum = $cont[1];

                                        $title = $cont[2];

                                        $listion = $cont[3];

                                        $currency = $cont[4];

                                        $startPrice = $cont[5];

                                        $buyIt = $cont[6];

                                        $avalible = $cont[7];

                                        $realtion_1 = $cont[8];

                                        $realtion_2 = $cont[9];

                                        $customLabel = $cont[10];

                                    if(empty($title)&&empty($listion)&&empty($currency)){

                                        $sql =  "SELECT Action,Itemnumber,Title,Listingsite,Currency FROM data ORDER BY id DESC LIMIT 1" ;
                                       

                                        $result = mysqli_query($con,$sql);

                                        while($row = mysqli_fetch_array($result)){
                                            $action = $row['Action'];
                                            $itemNum = $row['Itemnumber'];
                                            $title = $row['Title'];
                                            $listion = $row['Listingsite'];
                                            $currency = $row['Currency'];


                                    }
                                 }


                                    $query = "INSERT INTO data (Action,Itemnumber,Title,Listingsite,Currency,Startprice,BuyItNowprice,Availablequantity,Relationship,Relationshipdetails,Customlabel,channel)

                                    VALUES ('$action','$itemNum','$title','$listion','$currency','$startPrice','$buyIt','$avalible','$realtion_1','$realtion_2','$customLabel','$channel')";

                                    mysqli_query($con,$query);


                            

                        }
                    }

                


                }
            }

        ?>

    </form>


    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>




