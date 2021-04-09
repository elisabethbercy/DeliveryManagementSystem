<?php  
    //action.php
    $connect = mysqli_connect('localhost', 'root', '', 'testing');

    $input = filter_input_array(INPUT_POST);

    $numero_fiche = mysqli_real_escape_string($connect, $input["numero_fiche"]);
    $envoyeur = mysqli_real_escape_string($connect, $input["envoyeur"]);
    $receveur = mysqli_real_escape_string($connect, $input["receveur"]);
    $heure_envoie = mysqli_real_escape_string($connect, $input["heure_envoie"]);
    $heure_reception = mysqli_real_escape_string($connect, $input["heure_reception"]);
    //$temps_attente = strtotime($heure_reception)-strtotime($heure_envoie);
    // $temps_attente= gmdate("H:i:s", $temps_attente1);
    // echo $temps_attente;

    if($input["action"] === 'edit')
    {
        $query = "
        UPDATE tbl_user 
        SET numero_fiche = '".$numero_fiche."',
        envoyeur = '".$envoyeur."', 
        receveur = '".$receveur."', 
        heure_envoie = '".$heure_envoie."', 
        heure_reception = '".$heure_reception."'
        
        WHERE id = '".$input["id"]."'
        ";

        mysqli_query($connect, $query);

    }

    if($input["action"] === 'delete')
    {
        $query = "
        DELETE FROM tbl_user 
        WHERE id = '".$input["id"]."'
        ";
        mysqli_query($connect, $query);
    }

    echo json_encode($input);

?>
