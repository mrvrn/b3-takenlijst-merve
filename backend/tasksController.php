<?php 

$action = $_POST['action'];

if($action == "create")
{
    //Variabelen vullen
    $titel = $_POST['titel'];
    if(empty($titel))
    {
        $errors[] = "vul de titel in";
    }

    $beschrijving = $_POST['beschrijving'];
    if(isset($errors))
    {
        var_dump($errors);
        die();
    }

    $afdeling = $_POST['afdeling'];
    if(empty($afdeling))
    {
        $errors[] = "Kies een afdeling";
    }

    $deadline = $_POST['deadline'];
    if(empty($deadline))
    {
        $errors[] = "Vul een deadline in";
    }

    if (empty($errors)) {
        //1. Verbinding
        //2. Query
        $query = "INSERT INTO taken (titel, beschrijving, afdeling, deadline) VALUES(:titel, :beschrijving, :afdeling, :deadline)";

        //3. Prepare
        $statement = $conn->prepare($query);

        //4. Execute
        $statement->execute([
            ":titel" => $titel,
            ":beschrijving" => $beschrijving,
            ":afdeling" => $afdeling,
            ":deadline" => $deadline
        ]);

        header('location: ../tasks/index.php');
    } 
    
    else {

    }
}

?>