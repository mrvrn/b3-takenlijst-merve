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
            <h2 class="new-task">Nieuwe taak</h2>

            <form action="<?php echo $base_url; ?>/backend/tasksController.php" method="POST">
                
                <input type="hidden" name="action" value="create">
                <div class="form-group">
                    <label for="titel">Titel</label>
                    <input type="text" name="titel" id="titel" class="form-input">
                </div>
                <div class="form-group">
                    <label for="beschrijving">Beschrijving</label>
                    <textarea name="beschrijving" id="beschrijving" class="form-input" rows="3"></textarea> 
                </div>
                <div class="form-group">
                    <label for="afdeling">Afdeling</label>
                    <select name="afdeling" id="afdeling">
                        <option value=""> - Kies een type - </option> 
                        <option value="personeel">personeel</option>
                        <option value="horeca">horeca</option>
                        <option value="techniek">techniek</option>
                        <option value="inkoop">inkoop</option>
                        <option value="klantenservice">klantenservice</option>
                        <option value="groen">groen</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="deadline">Deadline</label>
                    <input type="date" name="deadline" id="deadline" class="form-input">
                </div>
                <input type="submit" value="Taak aanmaken" class="create-button create">
                <button class="cancel"><a href="<?php echo $base_url; ?>/tasks/index.php">Annuleren</a></button>
            </form>         

        </div>
    </main>

</body>

</html>