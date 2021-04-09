<?php
// $connect = mysqli_connect("localhost", "root", "", "testing");
//$result = mysqli_query($connect, $query);
?>
<!doctype html>
<html>
    <head>  
        <title>Live Table Data Edit Delete using Tabledit Plugin in PHP</title>  
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>            
            <script src="jquery.tabledit.min.js"></script>
    </head>  
    <body>
        <div class="container">
            <div class="content">
                <h1>Enregistrer une livraison</h1>
                <hr>

                
                <form method='post' class="form" action='bew.php'>

                    <?php

                        if( isset ($_POST)){

                            echo'<div class="alert alert-success" role="alert">
                                Enregistrement réussi !
                                </div>'
                            ;

                        }
                    ?>

                    <div class="form-group row">
                        <div class="col col-md-8">
                            <label for="validationCustom01" class="form-label">Expéditeur</label>
                            <input type="text" class="form-control" placeholder="Nom de l'expediteur" name="envoyeur"  required>
                        </div>
                        
                        <div class="col col-md-8 ">
                            <label for="validationCustom01" class="form-label">Receveur</label>
                            <input type="text" class="form-control" placeholder="Nom du receveur" name="receveur" required>
                        </div>

                        <div class="col col-md-8 ">
                            <label for="validationCustom01" class="form-label">Date d'envoie</label>
                            <input type="text" class="form-control" placeholder="0000-00-00 00:00:00 " name="date_envoie" aria-label="Last name" required>
                        </div> 
                        
                        <div class="col col-md-8">
                            <label for="validationCustom01" class="form-label">Date de reception</label>
                            <input type="text" class="form-control" placeholder="0000-00-00 00:00:00 " name="date_reception" aria-label="Last name" required>
                        </div>

                    </div>

                    <div class="col btn-save">
                        <button class="btn btn-primary" type="submit">Enregistrer</button>
                    </div>
                </form>
            </div>
            
        </div>
    
</body>
</html>

<?php
    // if( isset($_POST['envoyeur'])) | if( isset($_POST['receveur'])) | if( isset($_POST['date_envoie'])) | if( isset($_POST['date_reception']))
    // {
    //    $this->envoyeur = $ 
    // }
    
?>


