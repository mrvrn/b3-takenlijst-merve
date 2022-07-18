<!doctype html>
<html lang="nl">

<head>
    <title></title>
    <?php require_once '../head.php'; ?>
</head>

<body>

    <?php 
    require_once '../header.php';
    ?>

    <!-- <?php
    require_once '../backend/conn.php';

    $query = "SELECT * FROM taken ORDER BY deadline DESC";
    $statement = $conn->prepare($query);
    $statement->execute();
    $taken = $statement->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <?php

    $todoCount = 0;
    $doingCount = 0;
    $idoneCount = 0;

    foreach ($taken as $taak) {
        if ($taak['status'] == "todo") {
            $todoCount++;
        } else if ($taak['status'] == "doing") {
            $doingCount++;
        } else if ($taak['status'] == "done") {
            $doneCount++;
        }
    }
    ?>  -->

    <main>
        <div class="wrapper">
        <div class="container">

            <div class="tasks-top">
                <h1>Takenlijst</h1>
                <div class="buttons">
                    <button class="todo-button create-button"><a href="<?php echo $base_url; ?>/tasks/notdone.php"><i class="fa-solid fa-clipboard-list"></i>To Do</a></button>
                    <button class="done-button create-button"><a href="<?php echo $base_url; ?>/tasks/done.php"><i class="fa-solid fa-circle-check"></i>Done</a></button>
                    <button class="create-button"><a href="<?php echo $base_url; ?>/tasks/create.php"><i class="fa-solid fa-circle-plus"></i>Voeg taak toe</a></button>
                </div>
            </div> 
    
    <?php if(isset($_GET['msg']))
        {
            echo "<div class='msg'>" . $_GET['msg'] . "</div>";
        } 
        ?>



    <?php
            require_once '../backend/conn.php';
            $query = "SELECT * FROM taken ORDER BY deadline DESC";
            $statement = $conn->prepare($query);
            $statement->execute();
            $taken = $statement->fetchAll(PDO::FETCH_ASSOC);

    ?>

        <table class="table-home">
            <tr>
                <th>Titel</th>
                <th>Beschrijving</th>
                <th>Afdeling</th>
                <th>Status</th>
                <th>Deadline</th>
                <th></th>
            </tr>
            <?php foreach ($taken as $taak): ?>
                <tr>
                    
                    <td><?php echo $taak['titel']; ?></td>
                    <td><?php echo $taak['beschrijving']; ?></td>
                    <td><?php echo $taak['afdeling']; ?></td>
                    <td><?php echo $taak['status']; ?></td>
                    <td><?php echo $taak['deadline']; ?></td>
                    <td><a class="aanpassen-link" href="edit.php?id=<?php echo $taak['id']; ?>">Aanpassen</a></td> 
                </tr>
            <?php endforeach; ?>
        </table>        

    </div>
           

            <!-- div class="tasks-top">
                <h1>Takenlijst</h1>
                <button class="create-button"><a href="<?php echo $base_url; ?>/tasks/create.php"><i class="fa-solid fa-circle-plus"></i>Voeg taak toe</a></button>
            </div> 
            <div class="h2-top">         
                <h2 class="todo-h2">To Do</h2>
                <h2 class="doing-h2">Doing</h2>
                <h2 class="done-h2">Done</h2>
            </div> 
                <div class="panels">
                    
                
                    <div class="panel panel1">   
                        <div class="cards">
                            <?php if ($todoCount > 0): ?>
                                <?php foreach ($taken as $taak): ?>
                                <?php if ($taak['status'] == "todo"): ?>
                                    <div class="card">
                                        <h4 class="task-title"><?php echo $taak['titel']; ?></h4>
                                        <p class="task-description"><?php echo $taak['beschrijving']; ?></p>
                                        
                                        <p class="department"><?php echo $taak['afdeling']; ?></p>
                                        <p class="deadline"><?php echo $taak['deadline']; ?></p>
                                </div>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="message">
                                    <p class="no-data">geen taken</p>
                                </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="panel panel2">
                        
                        
                    </div>
                    <div class="panel panel3">
                        
                    </div>
                </div>

        </div>-->
    </main>
</body>

</html> 