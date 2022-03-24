<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Listing Management</title>  
           
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
          <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
     
      </head>  
      <body> 
          <div class="container">
          <div class="row">
              <h1 class = "text-center">View High Quantity</h1>
          <form action="" method="POST">
              <div class="input-group mb-3">
                <input class="btn btn-primary" type="submit" name="others" value="High Quantity"/>
                <a class="btn btn-dark" href="csvUplode.php" role="button">GO Next home</a>
              </div>
          </form>
          <?php
        
          if(isset($_POST['others']))
          {
               echo'<div class="col-md-8" style = "margin-left:1159px; margin-bottom:10px;">
                         <a class="btn btn-dark" href="downloard.php?filename=data" role="button">Download</a>
                    </div>';

               echo '<br><br><br><div class="container"> 
               <div class = "col-md-12">
                    <div class="table-responsive">  
                         <table id="getHighQnt" class="table table-striped table-bordered">  
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

    </div> 
        </div> 
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
          <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
          <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> 
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>  
 </html>
    <script>
        $(document).ready(function(){

            $('#getHighQnt').DataTable({
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
                       url:"getHighData.php",
                       type:"POST",
                    }
     
            });

        });
    </script>