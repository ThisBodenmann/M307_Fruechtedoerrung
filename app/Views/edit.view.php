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
    
        <h1>Auftrag anpassen</h1>

        <form method="post">

            <fieldset>

                <legend>Informationen zur Person</legend>

                <label for="name">Name: </label>
                <input type="text" id="name" value="<?php echo $name ?>" name="name">
                <br>
                <br>

                <label for="email">Email: </label>
                <input type="email" id="email" value="<?php echo $email ?>" name="email">
                <br>
                <br>

                <label for="phone">Telefon: </label>
                <input type="text" id="phone" value="<?php echo $phone ?>" name="phone">
                <br>
                <br>

            </fieldset>

            <fieldset>

                <legend>Produkt</legend>

                <label>Frucht: </label>
                <select name="fruits">
                    <option value="1" <?php if($fruit == '1'){echo("selected");}?>>'Ananas'</option>
                    <option value="2" <?php if($fruit == '2'){echo("selected");}?>>'Äpfel'</option>
                    <option value="3" <?php if($fruit == '3'){echo("selected");}?>>'Aprikosen'</option>
                    <option value="4" <?php if($fruit == '4'){echo("selected");}?>>'Avocado'</option>
                    <option value="5" <?php if($fruit == '5'){echo("selected");}?>>'Bananen'</option>
                    <option value="6" <?php if($fruit == '6'){echo("selected");}?>>'Birnen'</option>
                    <option value="7" <?php if($fruit == '7'){echo("selected");}?>>'Blondorangen'</option>
                    <option value="8" <?php if($fruit == '8'){echo("selected");}?>>'Blutorangen'</option>
                    <option value="9" <?php if($fruit == '9'){echo("selected");}?>>'Brombeeren'</option>
                    <option value="10" <?php if($fruit == '10'){echo("selected");}?>>'Clementinen'</option>
                    <option value="11" <?php if($fruit == '11'){echo("selected");}?>>'Erdbeeren'</option>
                    <option value="12" <?php if($fruit == '12'){echo("selected");}?>>'Feigen frisch'</option>
                    <option value="13" <?php if($fruit == '13'){echo("selected");}?>>'Grapefruits'</option>
                    <option value="14" <?php if($fruit == '14'){echo("selected");}?>>'Heidelbeeren'</option>
                    <option value="15" <?php if($fruit == '15'){echo("selected");}?>>'Himbeeren'</option>
                    <option value="16" <?php if($fruit == '16'){echo("selected");}?>>'Johannisbeeren'</option>
                    <option value="17" <?php if($fruit == '17'){echo("selected");}?>>'Kaki'</option>
                    <option value="18" <?php if($fruit == '18'){echo("selected");}?>>'Kirschen'</option>
                    <option value="19" <?php if($fruit == '19'){echo("selected");}?>>'Kiwi'</option>
                    <option value="20" <?php if($fruit == '20'){echo("selected");}?>>'Kiwi Bio Schweiz'</option>
                    <option value="21" <?php if($fruit == '21'){echo("selected");}?>>'Limetten'</option>
                    <option value="22" <?php if($fruit == '22'){echo("selected");}?>>'Litschis'</option>
                    <option value="23" <?php if($fruit == '23'){echo("selected");}?>>'Mango'</option>
                    <option value="24" <?php if($fruit == '24'){echo("selected");}?>>'Melonen'</option>
                    <option value="25" <?php if($fruit == '25'){echo("selected");}?>>'Mirabellen'</option>
                    <option value="26" <?php if($fruit == '26'){echo("selected");}?>>'Nektarinen'</option>
                    <option value="27" <?php if($fruit == '27'){echo("selected");}?>>'Papaya'</option>
                    <option value="28" <?php if($fruit == '28'){echo("selected");}?>>'Pfirsiche'</option>
                    <option value="29" <?php if($fruit == '29'){echo("selected");}?>>'Pflaumen'</option>
                    <option value="30" <?php if($fruit == '30'){echo("selected");}?>>'Preiselbeeren'</option>
                    <option value="31" <?php if($fruit == '31'){echo("selected");}?>>'Quitten'</option>
                    <option value="32" <?php if($fruit == '32'){echo("selected");}?>>'Stachelbeeren'</option>
                    <option value="33" <?php if($fruit == '33'){echo("selected");}?>>'Trauben'</option>
                    <option value="34" <?php if($fruit == '34'){echo("selected");}?>>'Kirschen'</option>
                    <option value="35" <?php if($fruit == '35'){echo("selected");}?>>'Zwetschgen'</option>
                </select>
                <br>
                <br>

                <label for="quantity">Menge: </label>
                <input name="quantity" id="quantity" value="<?php echo $quantity ?>" readonly>
                <br>
                <br>
                
            </fieldset>

            <fieldset>

                <legend>Infos</legend>

                <label for="creationDate">Erstellungsdatum: </label>
                <input name="creationDate" id="creationDate" value="<?php echo $orderDate ?>" readonly>

                <label for="completed">Status: </label>
                <input type="checkbox" name="completed" id="completed">
                <br>
                <br>

                <label for="time">Geschätzte Dörrungszeit: </label>
                <input type="text" id="time" name="time" value="<?php echo $returnDate ?>" readonly>
                <br>
                <br>
                
                <label for="id">AuftragsNummer: </label>
                <input type="text", id="id" name="id" value="<?php echo $orderId ?>" readonly>
                <br>
                <br>

                <input type="submit" name="submit" value="Submit"> 
            </fieldset>

        </form>

    </div>

    <script src="public/js/app.js"></script>
</body>
</html>
