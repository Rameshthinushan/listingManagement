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
  </head>
  <body>
      <div class="container">
          <div class="row">
              <div class="col-md-12" style="margin-top:50px;">
                  <figure class="text-center">
                    <h1>listing management</h1> 
                  </figure>
              </div>
          </div>
          <div class="btn-group" role="group" aria-label="Basic mixed styles example">
             <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Upload</button>
             <button type="button" class="btn btn-warning">View</button>
             <button type="button" class="btn btn-success">Right</button>
          </div>
      
    


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Upload CSV</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="" method="POST" id="form_1" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Channel</label>
                    </div>
                    <select class="form-select" id="Channel" name="Channel">
                        <option selected>Choose...</option>
                        <option value="led son">LED SONES</option>
                        <option value="son sones">SON SONES</option>
                        <option value="eletrical sones">ELETRICAL SONES</option>
                    </select>
                    </div>
        <label>Upload CSV</label>
            <input type="file" name="file" id="updateTrackingfile" class="form-control" accept=".csv" />
        <br />

        </form>
        </div>
        <!-- <form action="" method="POST"> -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input class="btn btn-primary" type="submit" form="form_1" value="Submit" name = 'btnUpload'>
        </div>
        <!-- </form> -->
        </div>
    </div>
    </div>
    <?php
    if(isset($_POST['btnUpload'])){
      $channel_1 = $_POST['Channel'];
       if($channel == "Choose..."){

                   echo "<script>
                        
                            alert('Please Select Channel')

                       </script>";

                }else{
                if($con){

                            $file = $_FILES['file']['tmp_name'];
                            
                            $handel = fopen($file,"r");

                            $i = 0;

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

                                        $sql =  "SELECT Title,Listingsite,Currency FROM data ORDER BY id DESC LIMIT 1" ;
                                       

                                        $result = mysqli_query($con,$sql);

                                        while($row = mysqli_fetch_array($result)){

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
    
</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>