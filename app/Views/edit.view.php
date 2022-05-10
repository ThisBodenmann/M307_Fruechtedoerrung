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

        <form>

            <fieldset>

                <legend>Informationen zur Person</legend>

                <label for="name">Name: </label>
                <input type="text" id="name" name="name">
                <br>
                <br>

                <label for="email">Email: </label>
                <input type="email" id="email" name="email">
                <br>
                <br>

                <label for="phone">Telefon: </label>
                <input type="text" id="phone" name="phone">
                <br>
                <br>

            </fieldset>

            <fieldset>

                <legend>Produkt</legend>

                <label>Frucht: </label>
                <select name="vegetables">
                    <option value="Ananas">'Ananas'</option>
                    <option value="Aepfel">'Äpfel'</option>
                    <option value="Aprikosen">'Aprikosen'</option>
                    <option value="Avocado">'Avocado'</option>
                    <option value="Bananen">'Bananen'</option>
                    <option value="Birnen">'Birnen'</option>
                    <option value="Blondorangen">'Blondorangen'</option>
                    <option value="Blutorangen">'Blutorangen'</option>
                    <option value="Brombeeren">'Brombeeren'</option>
                    <option value="Clementinen">'Clementinen'</option>
                    <option value="Erdbeeren">'Erdbeeren'</option>
                    <option value="Feigen frisch">'Feigen frisch'</option>
                    <option value="Grapefruits">'Grapefruits'</option>
                    <option value="Heidelbeeren">'Heidelbeeren'</option>
                    <option value="Himbeeren">'Himbeeren'</option>
                    <option value="Johannisbeeren">'Johannisbeeren'</option>
                    <option value="Kaki">'Kaki'</option>
                    <option value="Kirschen">'Kirschen'</option>
                    <option value="Kiwi">'Kiwi'</option>
                    <option value="Kiwi Bio Schweiz">'Kiwi Bio Schweiz'</option>
                    <option value="Limetten">'Limetten'</option>
                    <option value="Litschis">'Litschis'</option>
                    <option value="Mango">'Mango'</option>
                    <option value="Melonen">'Melonen'</option>
                    <option value="Mirabellen">'Mirabellen'</option>
                    <option value="Nektarinen">'Nektarinen'</option>
                    <option value="Papaya">'Papaya'</option>
                    <option value="Pfirsiche">'Pfirsiche'</option>
                    <option value="Pflaumen">'Pflaumen'</option>
                    <option value="Preiselbeeren">'Preiselbeeren'</option>
                    <option value="Quitten">'Quitten'</option>
                    <option value="Stachelbeeren">'Stachelbeeren'</option>
                    <option value="Trauben">'Trauben'</option>
                    <option value="Kirschen">'Kirschen'</option>
                    <option value="Zwetschgen">'Zwetschgen'</option>
                </select>
                <br>
                <br>

                <label>Menge: </label>
                <select name="weight">
                    <option value="0to5">'0-5 kg'</option>
                    <option value="5to10">'5-10 kg'</option>
                    <option value="10to15">'10-15 kg'</option>
                    <option value="15to20">'15-20 kg'</option>
                </select>
                <br>
                <br>
                
            </fieldset>

            <fieldset>

                <legend>Infos</legend>

                <label for="creationDate">Erstellungsdatum: </label>
                <input name="creationDate" id="creationDate" readonly>
                <br>
                <br>

                <label for="time">Geschätzte Dörrungszeit: </label>
                <input type="text" id="time" name="time" readonly>
            </fieldset>

        </form>

    </div>

    <script src="public/js/app.js"></script>
</body>
</html>
