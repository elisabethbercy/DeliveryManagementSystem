<?php
      $connect = mysqli_connect("localhost", "root", "", "testing");
      $query = "SELECT * FROM tbl_user ORDER BY id ASC";
      $result = mysqli_query($connect, $query);
      require('time_conversion.php');
?>
<!DOCTYPE html>
<html>  
      <head>  
            <title>Delivery data</title>

            <link rel="stylesheet" type="text/css" href="css/style.css"/> 

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>            
            <script src="jquery.tabledit.min.js"></script>
      </head>  

      <body> 
    
     
            <div class="container">  

                  <br/>  
                  <br/>  
                  <br/> 

                  <h1>Delivery Management system</h1>
                  <hr>
                  <br/>
                  <form method="POST" action="index.php">
                        <div class="row ">

                              <div class="col-sm new-link">
                                    <a href="new.php" class="btn btn-outline-primary">Add a new delivery</a>
                              </div>
                              
                              <div class="search-form float-end">
                                    <div class="col-md-8 form-group">
                                          <input type="text" class="form-control" placeholder="Rechercher">
                                          <!-- <button type="submit" class="btn btn-primary">Rechercher</button> -->
                                    </div>
                                    <button type="submit" class="btn btn-primary col-md">Search</button>
                              </div>
                              
                        </div>
                  </form>

                   

                        <div class="row mt-2">
                              <!-- <img class="col-sm" src="ck.png"  style="height:auto;   width:20%; object-fit:cover;" height="5%" width="150px"> -->
                        </div>

                  <div class="table-responsive">
                        <table id="editable_table" class="table table-bordered table-striped">
                              <thead>
                                    <tr>
                                          <th>ID</th>
                                          <th>Expediteur</th>
                                          <th>Receveur</th>
                                          <th>Heure d'envoie</th>
                                          <th>Heure de Reception</th>
                                          <th>Temps d'attente</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                          <?php
                                          //      echo $heure_envoie, $heure_reception;
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                      //      echo strtotime($row["heure_reception"]); echo " "; echo strtotime($row["heure_envoie"]); echo "<br>";
                                                      //      $T1=time_operation(strtotime($row["heure_reception"]),strtotime($row["heure_envoie"]));

                                                      echo '
                                                      <tr>
                                                            <td>'.$row["id"].'</td>
                                                            <td>'.$row["envoyeur"].'</td>
                                                            <td>'.$row["receveur"].'</td>
                                                            <td>'.$row["heure_envoie"].'</td>      
                                                            <td>'.$row["heure_reception"].'</td>
                                                            <td>'.time_operation(($row["heure_reception"]),($row["heure_envoie"])).'</td>
                                                      </tr>
                                                      ';
                                                }
                                          ?>
                                    </tbody>
                              </table>
                        </div>  
                  </div> 
            </div>
            <div class="" style="height:100px; width:500px; margin-left:1200px;">
                  <img src="AN.png"  style="object-fit:cover; height:auto;  width:100%;">
            </div>  
      </body>  
</html> 

<script>  
      $(document).ready(function(){  
      $('#editable_table').Tabledit({
            url:'action.php',
            columns:{
            identifier:[0, "id"],
            editable:[[1, 'envoyeur'], [2, "heure_envoie"], [3,'receveur'], [4,'heure_reception']]
            },
            restoreButton:false,
            onSuccess:function(data, textStatus, jqXHR)
            {
            if(data.action == 'delete')
            {
            $('#'+data.id).remove();
            }
            }
      });
      
      });  
 </script>
