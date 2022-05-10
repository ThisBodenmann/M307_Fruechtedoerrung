<?php
class Tasks
{
    public $auftragId;
    public $fruit;
    public $name;
    public $phone;
    public $email;
    public $weight;
    public $orderDate;
    public $returnDate;
    public $quantity;
    public $completed;

    public function __construct($fruit = null, $name = null, $phone = null, $email = null, $weight = null,$orderDate = null,$returnDate = null)
    {
        $this->fruit = $fruit;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->weight = $weight;
        $this->orderDate = $orderDate;
        $this->returnDate = $returnDate;
        $this->completed = $completed;

        return $this;
    }

    public function find(int $id): ?self
    {
        $statement = db()->prepare('SELECT * FROM example WHERE id = :id LIMIT 1');
        $statement->bindParam(':id', $id);
        $statement->execute();
        $result = $statement->fetch();

        if ($result) {
            // Datensatz gefunden? Eigenschaften setzen und Objekt zurückgeben.
            $this->id = $result['id'];
            $this->name = $result['name'];

            return $this;
        }

        // Datensatz NICHT gefunden -> null zurückgeben.
        return null;
    }

    /**
     * Alle Datensätze aus der Datenbank laden.
     */
    public static function getAll()
    {
        $statement = connectToDatabase()->prepare('select * from auftrag');
        $statement->execute();
        $results = $statement->fetchAll();
        $tasks = [];
        foreach ($results as $task) {
            $tasks[] = Tasks::ResultToTask($task);
        }
        return $tasks;
    }

    private static function ResultToTask($dbr)
    {   
        return new Tasks(
            $dbr['auftragId'],
            $dbr['name'],
            $dbr['phone'],
            $dbr['fruit'],
            $dbr['weight'],
            $dbr['orderDate'],
            $dbr['returnDate'],
            $dbr['completed'],
        );
    }
    /**
     * Erstellt einen neuen Eintrag in der Datenbank.
     */
    public function create()
    {
        $err = [];
        $tempName = $_POST['name'];
        if(isset($tempName) and trim($tempName) != "") {
            $name = trim($tempName);
        } else {
            array_push($err, "Bitte validen Namen eingeben!");
        }

        $tempEmail = $_POST['email'];
        if (isset($tempEmail) and trim($tempEmail) != "") {
            $email = trim($tempEmail);
        } else {
            array_push($err, "Bitte valide Email eingeben!");
        }

        $tempPhone = $_POST['phone'];
        if (isset($tempPhone) and trim($tempPhone) != "") {
            $phone = trim($tempPhone);
        } else {
            array_push($err, "Bitte valide Telefonnummer eingeben!");
        }

        $tempFruits = $_POST['fruits'];
        if (isset($tempFruits) and trim($tempFruits) != "") {
            $fruit = trim($tempFruits);
        } else {
            array_push($err, "Bitte valide Frucht auswählen!");
        }

        $tempWeight = $_POST['weight'];
        if (isset($tempWeight) and trim($tempWeight) != "") {
            $weight = trim($tempWeight);
        } else {
            array_push($err, "Bitte validen Gewichtswert eingeben!");
        }

        if (count($err) == 0) {
            $pdo = new PDO('mysql:host=localhost;dbname=ictkursm307', 'root');
            $currentDate = date("Y-m-d");
            
            switch ($weight) {
                case "0to5":
                    $weight = "0kg-5kg";
                    $days = 5;
                    break;
                case "5to10":
                    $weight = "5-10kg";
                    $days = 8;
                    break;
                case "10to15":
                    $weight = "10kg-15kg";
                    $days = 12;
                    break;
                default:
                    $weight = "15-20kg";
                    $days = 18;
                    break;
            }
                
            // $Date = $currentDate;
            // $endDate = date('Y-m-d', strtotime($Date. ' + 3 days'));

            $statement = $pdo->prepare("INSERT INTO auftrag (auftragDate, email, fk_fruitId, name, phone, returndate, quantity) VALUES ('$currentDate', \"$email\", $fruit, \"$name\", $phone, '2022-05-10', \"$weight\")");
            $statement->execute();

            $message = "Erfolgreich abgesendet!";
            echo "<script type='text/javascript'>alert('$message');</script>";

            header("app/views/main.view.php");
            unset($_POST);
        } else {
            $message = "";
            foreach ($err as $error) {
                $message = $message . '\r\n' . $error;
            }

            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
    
    /**
     * Aktualisiert die aktuellen Daten in der Datenbank.
     */
    public function update(): int
    {
        // Dein Code...
    }

    /**
     * Lösche einen Datensatz, entweder mit der angegebenen $id oder falls nicht angegeben, der aktuell geladene.
     */
    public function delete(int $id = 0): int
    {
        // Falls keine $id angegeben ist, lösche den aktuell geladenen ($this->id) des Objektes.
        if (!$id) {
            $id = $this->id;
        }

        if ($id > 0) {
            // Datensatz löschen (DELETE)
            // Dein Code ...
            
            // Gib die Anzahl der gespeicherten Datensätze zurück (1 = Erfolg, 0 = Fehler)
            // return $statement->rowCount();
        }

        return 0;
    }
}
