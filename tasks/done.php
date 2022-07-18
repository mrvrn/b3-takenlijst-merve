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

    <main>
        <div class="wrapper">


            <div class="tasks-top">
                <h1>Done</h1>
                <div class="buttons">
                    <button class="back-button cancel"><a href="<?php echo $base_url; ?>/tasks/index.php"><i class="fa-solid fa-circle-arrow-left"></i>Terug</a></button>
                    <button class="todo-button create-button"><a href="<?php echo $base_url; ?>/tasks/notdone.php"><i class="fa-solid fa-clipboard-list"></i>To Do</a></button>
                    <button class="done-button create-button"><a href="<?php echo $base_url; ?>/tasks/done.php"><i class="fa-solid fa-circle-check"></i>Done</a></button>      
                </div>
            </div> 

            <?php if(isset($_GET['msg']))
                {
                    echo "<div class='msg'>" . $_GET['msg'] . "</div>";
                } 
                ?>



            <?php
                require_once '../backend/conn.php';
                $query = "SELECT * FROM taken WHERE status = 'done' ORDER BY deadline DESC";
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
    </main>
</body>
</html> 

