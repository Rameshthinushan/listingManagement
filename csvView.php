<?php  

 $connect = mysqli_connect("localhost", "root", "", "dataStore");  
  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Listing Management</title>  
           
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
          <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
     
      </head>  
      <body> 
           
       <h1 align="center" style ="margin-top:20px;">Listing Management</h1><br/> 

          <form action="" method="POST">

               <div class="container" style = "margin-top : 50px;">
                    <!-- <div class="col-md-6">
                         <select class="form-select" aria-label="Default select example" name ="Channel">
                              <option selected>Open this select menu</option>
                              <option value="led son">LED sones</option>
                              <option value="son sones">SON sones</option>
                              <option value="eletrical sones">Eletrical sones</option>
                         </select>
                    </div>  -->
                    <div class="col-md-3">        
                         <input class="btn btn-warning" type="submit" name="view" value="View All"/>
                         <!-- <input class="btn btn-success" type="submit" name="getLowQnt" value="Low"/> -->
                         <!-- <input class="btn btn-primary" type="submit" name="others" value="Other"/> -->
                         <a class="btn btn-dark" href="viewLowQnt.php" role="button">GO Next Page</a> <br /><br/> 
                    </div>
               </div>


          </form> 
           

          <?php

          if(isset($_POST['view'])){

          echo '<br><br><div class="container"> 

                    <div class = "col-md-12">

                         <div class="table-responsive">  

                              <table id="employee_data" class="table table-dark table-striped">  
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
               
}
        

          ?> 
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
          <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
          <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> 
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      </body>  
 </html>  
    <script>
        $(document).ready(function(){

            $('#employee_data').DataTable({
                "processing":true,
                "serverSide":true,
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
                       type:"POST",
                    }
     
            });

        });
    </script>


