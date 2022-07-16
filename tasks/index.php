<!doctype html>
<html lang="nl">

<head>
    <title></title>
    <?php require_once '../head.php'; ?>
</head>

<body>

    <?php require_once '../header.php'; ?>

    <main>
        <div class="wrapper">
            <div class="tasks-top">
                <h1>Takenlijst</h1>
                <button class="create-button"><a href="<?php echo $base_url; ?>/tasks/create.php">Voeg taak toe</a></button>
            </div>           
                <div class="panels">
                    <div class="panel panel1">
                        <h2>To Do</h2>
                        <div class="cards">
                            
                        </div>
                    </div>
                    <div class="panel panel2">
                        <h2>Doing</h2>
                    </div>
                    <div class="panel panel3">
                        <h2>Done</h2>
                    </div>
                </div>
        </div>
    </main>

</body>

</html>