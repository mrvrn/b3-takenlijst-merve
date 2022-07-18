<!doctype html>
<html lang="nl">

<head>
    <title>Taak Aanpassen</title>
    <?php require_once '../head.php'; ?>
</head>

<body>

    <?php require_once '../header.php'; ?>
    <main class="edit-main">
        <div class="container">
            <h1>Taak aanpassen</h1>

            <?php
            //Haal het id uit de URL:
            $id = $_GET['id'];

            //1. Haal de verbinding erbij
            require_once '../backend/conn.php'; 

            //2. Query, vul deze aan met een WHERE zodat je alleen de melding met dit id ophaalt
            $query = "SELECT * FROM taken WHERE id = :id";

            //3. Van query naar statement
            $statement = $conn->prepare($query);

            //4. Voer de query uit, voeg hier nog de placeholder toe
            $statement->execute([":id" => $id]);

            //5. Ophalen gegevens, tip: gebruik hier fetch().
            $taak = $statement->fetch(PDO::FETCH_ASSOC);
            ?>
            
            <form action="../backend/tasksController.php" method="POST">            
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                    <div class="form-group">
                        <label for="titel">Titel</label>
                        <input type="text" name="titel" id="titel" value="<?php echo $taak['titel']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="beschrijving">Beschrijving</label>
                        <textarea name="beschrijving" id="beschrijving" rows="3"><?php echo $taak['beschrijving']; ?></textarea> 
                    </div>

                    <div class="form-group">
                        <label for="afdeling">Afdeling</label>
                        <select name="afdeling" id="afdeling">
                            <option value=""> <?php echo $taak['afdeling']; ?></option>
                            <option value="personeel"
                            
                            <?php
                            if ($taak['afdeling'] == "personeel") {
                                echo "selected";
                            }
                            ?>
                            
                            >personeel</option>

                            <option value="horeca"
                            
                            <?php
                            if ($taak['afdeling'] == "horeca") {
                                echo "selected";
                            }
                            ?>
                            
                            >horeca</option>

                            <option value="techniek"
                            
                            <?php
                            if ($taak['afdeling'] == "techniek") {
                                echo "selected";
                            }
                            ?>
                            
                            >techniek</option>

                            <option value="inkoop"
                            
                            <?php
                            if ($taak['afdeling'] == "inkoop") {
                                echo "selected";
                            }
                            ?>
                            
                            >inkoop</option>

                            <option value="klantenservice"
                            
                            <?php
                            if ($taak['afdeling'] == "klantenservice") {
                                echo "selected";
                            }
                            ?>
                            
                            >klantenservice</option>

                            <option value="groen"
                            
                            <?php
                            if ($taak['afdeling'] == "groen") {
                                echo "selected";
                            }
                            ?>
                            
                            >groen</option>
                        </select>
                    </div>

                    <div class="form-group">
                    <label for="type">Status</label>
                    <select name="status" id="status">
                        <option value="">- Status -</option>
                        <option value="todo"
                        
                        <?php
                            if ($taak['status'] == "todo") {
                                echo "selected";
                            }
                        ?>
                        
                        > To Do </option>
                        <option value="doing"
                        
                        <?php
                            if ($taak['status'] == "doing") {
                                echo "selected";
                            }
                        ?>
                        
                        >Doing</option>
                        <option value="done"
                        
                        <?php
                            if ($taak['status'] == "done") {
                                echo "selected";
                            }
                        ?>
                        
                        >Done</option>
                        <?php echo $taak['status']; ?>
                    </select>
                </div>
                
                    <div class="form-group">
                        <label for="deadline">Deadline</label>
                        <input type="date" name="deadline" id="deadline" class="form-input" value="<?php echo $taak['deadline']; ?>">
                    </div>

                    <input type="submit" value="Taak opslaan" class="create-button" >
                    <button class="cancel"><a href="<?php echo $base_url; ?>/tasks/index.php">Annuleren</a></button>

            </form>       

        
            
            <form action="../backend/tasksController.php" method="POST">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" value="Verwijderen" class="cancel delete-button">
            </form>

        </div>  
    </main>

</body>

</html>