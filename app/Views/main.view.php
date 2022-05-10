<!DOCTYPE html>
<html lang="de">
<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
<head>
    <meta charset="UTF-8">
    <title>Meine Seite</title>
    <!-- Set base for relative urls to the directory of index.php: -->
    <base href="<?= ROOT_URL ?>/">
    <link rel="stylesheet" href="public/css/app.css">
</head>
<body>
    <div class="container">
    
        <h1>Übersicht über alle Aufträge</h1>

        <table style="width:80%">
            <tr>
                <th style="width:10%">Dörrstatus</th>
                <th style="width:20%">Enddatum</th>
                <th style="width:20%">Name</th>
                <th style="width:20%">Email</th>
                <th style="width:20%">Frucht</th>
                <th style="width:10%">Menge</th>
            </tr>
            <?php 
                foreach ($tasks as $task) {
                    $emoji = ($task->returnDate >= date("Y-m-d") ? '😁' : '😠');
                }
            ?>
            <tr>
                <td><?= $task->name ?></td>
                <td>TEST</td>
                <td>TEST</td>
                <td>TEST</td>
                <td>TEST</td>
                <td>TEST</td>
            </tr>
            <tr>
                <td>TEST</td>
                <td>TEST</td>
                <td>TEST</td>
                <td>TEST</td>
                <td>TEST</td>
                <td>TEST</td>
            </tr>
        </table>

    </div>

    <script src="public/js/app.js"></script>
</body>
</html>
