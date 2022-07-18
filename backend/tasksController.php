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

    if(isset($errors))
    {
        var_dump($errors);
        die();
    }

    if (empty($errors)) {
        //1. Verbinding
        require_once 'conn.php';

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
    
}
   
if($action == "edit")
{
    $id = $_POST['id'];
    $titel = $_POST['titel'];
    if(empty($titel))
    {
        $errors[] = "Vul een titel in";
    }

    $beschrijving = $_POST['beschrijving'];
    if(empty($beschrijving))
    {
        $errors[] = "Vul een beschrijving in";
    }

    $afdeling = $_POST['afdeling'];
    if(!isset($afdeling))
    {
        $errors[] = "Kies een afdeling";
    }


    $status = $_POST['status'];
    if(!isset($status))
    {
        $errors[] = "Kies een status";
    }


    $deadline = $_POST['deadline'];
    if(empty($deadline))
    {
        $errors[] = "Vul een deadline in";
    }

    if(isset($errors))
    {
        var_dump($errors);
        die();
    }

    //1. Verbinding
    require_once 'conn.php';

    //2. Query
    $query = "UPDATE taken SET titel = :titel, beschrijving = :beschrijving, afdeling = :afdeling, status = :status, deadline = :deadline WHERE  id = :id";
    
    //3. Prepare
    $statement = $conn->prepare($query);

    //4. Execute
    $statement->execute([       
        ":titel" => $titel,
        ":beschrijving" => $beschrijving,
        ":afdeling" => $afdeling,
        ":status" => $status,
        ":deadline" => $deadline,
        ":id" => $id       
    ]);



    header("Location:../tasks/index.php?msg= Aangepast");

}

if($action == "delete")
{
    $id = $_POST['id'];
    require_once 'conn.php';
    $query = "DELETE FROM taken 
              WHERE id = :id";
    $statement = $conn->prepare($query);
    $statement->execute([
        ":id" => $id
    ]);
    header("Location: ../tasks/index.php?msg= Verwijderd");
}


?>