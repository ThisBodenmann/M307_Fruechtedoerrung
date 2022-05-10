<!DOCTYPE html>
<html lang="de">
<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
<head>
    <meta charset="UTF-8">
    <title>Meine Seite</title>
    <link rel="stylesheet" href="public/css/app.css">
    <script src="public/js/app.js"></script>
</head>
<body>
    <form action="home" method="POST">
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Dörrstatus</th>
                    <th>Enddatum</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Menge</th>
                    <th>Bearbeiten</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task) {
                        $completed = ($task->completed = 0 ? '✅' : '❌');
                    ?>
                        <tr>
                            <td><?= $completed ?></td>
                            <td><?= $task->returnDate ?></td>
                            <td><?= $task->name ?></td>
                            <td><?= $task->email ?></td>
                            <td><?= $task->quantity ?></td>
                            <td>
                                <a href="update?taskId=<?= $task->$auftragId ?>">
                                    <button id="btnEdit" type="button">
                                        <img class="editbtn" id="editImg" src="public/icons/edit.png" alt="Edit">
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
            </tbody>
        </table>
    </form>
</body>
</html>
