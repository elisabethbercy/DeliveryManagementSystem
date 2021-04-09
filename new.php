<?php
$connect = mysqli_connect("localhost", "root", "", "testing");
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
                <h2>Enregistrer une livraison</h2>
                <div class="delivery">
                    <a href="index.php" class="link">Liste de livraison</a>
                </div>
                <hr>

                
                <form method='post' class="form" action='new.php'>

                    <?php

                        if (isset($_POST['numero_fiche']) AND ($_POST['envoyeur']) AND ($_POST['receveur']) AND ($_POST['heure_envoie']) AND ($_POST['heure_reception']))
                        {
                            
                            try {

                                $stmt = $connect->prepare(" INSERT INTO tbl_user(numero_fiche, envoyeur, heure_envoie, receveur, heure_reception)
                                                    VALUES (?, ?, ?, ?, ?)");
                                $stmt->bind_param('sssss', $numero_fiche, $envoyeur, $heure_envoie, $receveur, $heure_reception);
                                
                                $input = filter_input_array(INPUT_POST);

                                $numero_fiche = mysqli_real_escape_string($connect, $input["numero_fiche"]);
                                $envoyeur = mysqli_real_escape_string($connect, $input["envoyeur"]);
                                $receveur = mysqli_real_escape_string($connect, $input["receveur"]);
                                $heure_envoie = mysqli_real_escape_string($connect, $input["heure_envoie"]);
                                $heure_reception = mysqli_real_escape_string($connect, $input["heure_reception"]);

                                $stmt->execute();
                                
                                // $mysqli->close();
                                // mysqli_query($connect, $stmt);
                                echo'<div class="alert alert-success" role="alert">
                                    Enregistrement réussi !
                                    </div>'
                                ;
                            } catch(PDOException $e) {
                                
                                echo'<div class="alert alert-danger" role="alert">
                                    L\' enregistrement n\'a pas été faite  !
                                    </div>'
                                ;
                                // echo "Error: " . $e->getMessage();
                            }

                        }
                    ?>

                    <div class="form-group row">

                        <div class="col col-md-8">
                            <label for="validationCustom01" class="form-label">Numéro de la facture</label>
                            <input type="number" class="form-control" placeholder="Numéro de la facture" name="numero_fiche"  required>
                        </div>

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
                            <input type="date" class="form-control" placeholder="0000-00-00 00:00:00 " name="heure_envoie" aria-label="heure_envoie" required>
                        </div> 
                        
                        <div class="col col-md-8">
                            <label for="validationCustom01" class="form-label">Date de reception</label>
                            <input type="date" class="form-control" placeholder="0000-00-00 00:00:00 " name="heure_reception" aria-label="heure_reception" required>
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


