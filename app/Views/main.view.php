<!DOCTYPE html>
<html lang="de">
<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
<head>
    <meta charset="UTF-8">
    <title>Fruchte-Dörrung</title>
    <link rel="stylesheet" href="public/css/app.css">
    <script src="public/js/app.js"></script>
</head>
<body>
        <button class="btnCreate" type="button" onclick="window.location.href='http://web.kurse.ict-bz.ch/m307_1/06_Doerrfruechte/create'">Neuen Auftrag erstellen</button>

        <table class="styled-table">
            <thead>
                <tr>
                    <th>Dörrstatus</th>
                    <th>Enddatum</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Menge</th>
                    <th>Frucht</th>
                    <th>Bearbeiten</th>
                    <th>Löschen</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task) {
                        $state = ($task->returnDate < date("Y-m-d") ? '🥔' : '🍎');
                    ?>
                        <tr>
                            <td><?= $state ?></td>
                            <td><?= $task->returnDate ?></td>
                            <td><?= $task->name ?></td>
                            <td><?= $task->email ?></td>
                            <td><?= $task->quantity ?></td>
                            <td><?= $task->fruit->name ?></td>

                            <td>
                                <a href="edit?taskId=<?= $task->orderId ?>">
                                    <button type="submit" name="submit" id="editbtn">
                                        <img class="editbtn" id="editImg" src="public/icons/edit.png" alt="Edit">
                                    </button>
                                </a>
                            </td>
                            <td>
                                <a href="delete?taskId=<?= $task->orderId ?>">
                                    <button id="btnDelete" type="button">
                                        <img class="btnDelete" id="deleteImg" src="public/icons/delete.png" alt="Delete">
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
            </tbody>
        </table>

</body>
</html>
