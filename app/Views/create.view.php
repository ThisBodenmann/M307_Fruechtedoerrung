<!DOCTYPE html>
<html lang="de">
<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
<head>
    <meta charset="UTF-8">
    <title>Meine Seite</title>
    <!-- Set base for relative urls to the directory of index.php: -->
    <link rel="stylesheet" href="public/css/app.css">
</head>
<body>
    <div class="container">
    
        <h1>Neuer Auftrag erfassen</h1>

        <form method="post">

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
                <select name="fruits">
                    <option value="1">'Ananas'</option>
                    <option value="2">'Äpfel'</option>
                    <option value="3">'Aprikosen'</option>
                    <option value="4">'Avocado'</option>
                    <option value="5">'Bananen'</option>
                    <option value="6">'Birnen'</option>
                    <option value="7">'Blondorangen'</option>
                    <option value="8">'Blutorangen'</option>
                    <option value="9">'Brombeeren'</option>
                    <option value="10">'Clementinen'</option>
                    <option value="11">'Erdbeeren'</option>
                    <option value="12">'Feigen frisch'</option>
                    <option value="13">'Grapefruits'</option>
                    <option value="14">'Heidelbeeren'</option>
                    <option value="15">'Himbeeren'</option>
                    <option value="16">'Johannisbeeren'</option>
                    <option value="17">'Kaki'</option>
                    <option value="18">'Kirschen'</option>
                    <option value="19">'Kiwi'</option>
                    <option value="20">'Kiwi Bio Schweiz'</option>
                    <option value="21">'Limetten'</option>
                    <option value="22">'Litschis'</option>
                    <option value="23">'Mango'</option>
                    <option value="24">'Melonen'</option>
                    <option value="25">'Mirabellen'</option>
                    <option value="26">'Nektarinen'</option>
                    <option value="27">'Papaya'</option>
                    <option value="28">'Pfirsiche'</option>
                    <option value="29">'Pflaumen'</option>
                    <option value="30">'Preiselbeeren'</option>
                    <option value="31">'Quitten'</option>
                    <option value="32">'Stachelbeeren'</option>
                    <option value="33">'Trauben'</option>
                    <option value="34">'Kirschen'</option>
                    <option value="35">'Zwetschgen'</option>
                </select>
                <br>
                <br>

                <label>Menge: </label>
                <select name="quantity" id="quantity">
                    <option value="0to5">'0-5 kg'</option>
                    <option value="5to10">'5-10 kg'</option>
                    <option value="10to15">'10-15 kg'</option>
                    <option value="15to20">'15-20 kg'</option>
                </select>
                <br>
                <br>

                <label for="time">Geschätzte Dörrungszeit: </label>
                <input type="text" id="time" name="time" readonly>
                <br>
                <br>
                
                <input type="submit" name="submit" value="Submit"> 

            </fieldset>

        </form>

    </div>

    <script src="public/js/app.js"></script>
</body>
</html>
