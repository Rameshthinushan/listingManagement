<?php

$con = mysqli_connect("localhost","root","","dataStore");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="col-md-12">
        <h1 class="text-center">Listig Managemnt</h1>
        
            <div class="row">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="col-md-4">
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
                    </div>
                    <div class="col-md-3">
                        <input type="file" name="file" id="file" class="form-control" />
                    </div>
                    <div class="col-md-3">
                        <input class="btn btn-danger" type="submit" name="btnUpload" value="Upload">
                        <!-- <input class="btn btn-info" type="submit" name="View" value="View"> -->
                        
                    </div>
            </form> 

<div class="col-md-3">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Filter</button>
</div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Get Low Quantity</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form  id="form_1" method="POST">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Quantity Wise</label>
                                </div>
                                <select class="form-select" id="Quantity" name="Qnt">
                                    <option value="All">All</option>
                                    <option value="lowQuantity">Low Quantity</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">channel wise</label>
                                </div>
                                <select class="form-select" id="Channel_1" name="Qnt">
                                    <option value="All">All</option>
                                    <option value="led sone">LED sone</option>
                                    <option value="son sones">SON sone</option>
                                    <option value="eletrical sone">ELETRICAL sone</option>
                                </select>
                            </div>
                        
                            </div>
                            
                            <div class="modal-footer">
                                <input class="btn btn-danger" type="submit"  name="filter" value="Filter">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                     </form>
                    </div>
                </div>
                </div>
            </div>
        
        </div>
        <?php
        
            if(isset($_POST['btnUpload'])){

                $channel = $_POST['Channel'];
                
                
                 if($channel == "Choose..."){
                    echo "<script>
                        
                            alert('Please Select Channel')

                       </script>";
                 }else{
                    if($con){

                            $file_1 = $_FILES['file']['tmp_name'];
                            
                            //print_r($file_1);
                             $handel = fopen($file_1,"r");

                            // //print_r($handel);
                            
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

         //if(isset($_POST['filter'])){

            echo '<div class="container"> 

                    <div class = "col-md-12">

                         <div class="table-responsive">  

                              <table id="demoFinal" class="table table-dark table-striped">  
                                   <thead>  
                                        <tr>

                                             <th>Action</th>

                                             <th>Item Number</th>
                                             
                                             <th>Title</th>

                                             <th>Listing Site</th>

                                             <th>Currency</th>

                                             <th>Start Price</th>

                                             <th>Buy It Now Price</th>

                                             <th>Available Quality</th>

                                             <th>Realtion Ship</th>

                                             <th>Realation Ship Deatails</th>

                                             <th>Custom Label</th>

                                             <th>Channel</th>

                                        </tr>

                                   </thead>

                              </table>

                         </div> 

                    </div>  

               </div>';  
          // }


            //    if(isset($_POST['filter'])){
                
            //     $qnt = $_POST['Qnt'];

            //     if($qnt == "Choose..."){
            //      echo "<script>
                        
            //                 alert('Please Select Your Option')

            //            </script>";
            //     }else if($qnt == "GetLowQnt"){
            //          echo'<form action = "downloadCsv.php" method="POST">
            //                 <div class="col-md-8" style = "margin-left:1159px; margin-bottom:10px;">
            //                     <input class="btn btn-dark" type="submit" name="download" value="Download">
            //                 </div>
            //               </form>';
            //    echo '<br><br><br><div class="container"> 
            //    <div class = "col-md-12">
            //         <div class="table-responsive">  
            //              <table id="getLowQnt" class="table table-dark table-striped">  
            //                 <thead>  
            //                     <tr>
            //                         <th>Action</th>
            //                         <th>Item Number</th>                                        
            //                         <th>Title</th>
            //                         <th>Listing Site</th>
            //                         <th>Currency</th>
            //                         <th>Start Price</th>
            //                         <th>Buy It Now Price</th>
            //                         <th>Available Quality</th>
            //                         <th>Realtion Ship</th>
            //                         <th>Realation Ship Deatails</th>
            //                         <th>Custom Label</th>
            //                     </tr>
            //                   </thead>
            //                 </table>  
            //         </div> 
            //     </div>  
            //     </div>'; 
            //     }
                
            //    }


        ?>
        
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

<script>



        $(document).ready(function(){

            var demoFinal = $('#demoFinal').DataTable({
                "processing":true,
                "serverSide":true,
                'serverMethod': 'post',
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                    ],
                "order" : [],
                columnDefs: [ {
                    'targets': [0], 
                    'orderable': false,
                    }],
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "iDisplayLength": 25,
                "searching" : true,
                "ajax":{
                       url:"getData.php",
                       data : function(data){
                        var Quentity = $('#Quantity').val();
                         if (Quentity == "All") {
                              Quentity = "";
                         }
                         // Append to data
                         data.Qnt = Quentity;
                         // filter by shipping service end
                        var Channel = $('#Channel_1').val();
                         if (Channel == "All") {
                              Channel = "";
                         }
                         // Append to data
                         data.Chan = Channel;
                         // filter by shipping service end
                        console.log(data);
                       }
                    }
                    
            });

             $(document).on('submit', '#form_1', function(event) {
               event.preventDefault();
               refreshTable();
               // hide the modal - start
               //$('#exampleModal').modal('hide');
               // hide the modal - end
          });

            function refreshTable() {
               demoFinal.clear();
               demoFinal.draw();

          }


        });

           






        // $(document).ready(function(){

        //     $('#getLowQnt').DataTable({
        //         "processing":true,
        //         "serverSide":true,
        //         "order" : [],
        //         columnDefs: [ {
        //             'targets': [0], 
        //             'orderable': false,
        //             }],
        //         "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        //         "iDisplayLength": 25,
        //         "searching" : true,
        //         "ajax":{
        //                url:"getLowData.php",
        //                type:"POST",
        //             }
     
        //     });

        // });
    </script>