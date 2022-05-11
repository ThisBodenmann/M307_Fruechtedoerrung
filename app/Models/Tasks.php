<?php
class Tasks
{
    public $orderId;
    public $name;
    public $phone;
    public $email;
    public $quantity;
    public $orderDate;
    public $returnDate;
    public $completed;
    public $fruit;


    public function __construct($orderId = null, $name = null, $phone = null, $email = null, $quantity = null, $orderDate = null, $returnDate = null, $completed = null, $fruit = null)
    {
        $this->orderId = $orderId;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->quantity = $quantity;
        $this->orderDate = $orderDate; 
        $this->returnDate = $returnDate;
        $this->completed = $completed;
        $this->fruit = $fruit;

        return $this;
    }

    public function find(int $id)
    {
        $statement = db()->prepare('SELECT name FROM fruits WHERE id = :id LIMIT 1');
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
        $statement = connectToDatabase()->prepare('select * from auftrag where completed = false');
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
            $dbr['orderId'],
            $dbr['name'],
            $dbr['phone'],
            $dbr['email'],
            $dbr['quantity'],
            $dbr['orderDate'],
            $dbr['returnDate'],
            $dbr['completed'],
            Fruits::getFruitById($dbr['fk_fruitId']),
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

        $word = "@";
        $tempEmail = $_POST['email'];
        if (isset($tempEmail) and trim($tempEmail) != "" and trpos($$tempEmail, $word) !== false) {
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

        $tempWeight = $_POST['quantity'];
        if (isset($tempWeight) and trim($tempWeight) != "") {
            $quantity = trim($tempWeight);
        } else {
            array_push($err, "Bitte validen Gewichtswert eingeben!");
        }

        if (count($err) == 0) {
            $pdo = new PDO('mysql:host=localhost;dbname=ictkursm307', 'root');
            $currentDate = date("Y-m-d");
            
            switch ($quantity) {
                case "0to5":
                    $quantity = "0kg-5kg";
                    $days = 5;
                    break;
                case "5to10":
                    $quantity = "5-10kg";
                    $days = 8;
                    break;
                case "10to15":
                    $quantity = "10kg-15kg";
                    $days = 12;
                    break;
                default:
                    $quantity = "15-20kg";
                    $days = 18;
                    break;
            }
                
            $Date = $currentDate;
            $endDate = date('Y-m-d', strtotime($Date. " + $days days"));

            $statement = $pdo->prepare("INSERT INTO auftrag (auftragDate, email, fk_fruitId, name, phone, returndate, quantity) VALUES ('$currentDate', \"$email\", $fruit, \"$name\", $phone, '$endDate', \"$quantity\")");
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
    public function update()
    {

    }

    /**
     * Lösche einen Datensatz, entweder mit der angegebenen $id oder falls nicht angegeben, der aktuell geladene.
     */
    public static function delete()
    {
        // Falls keine $id angegeben ist, lösche den aktuell geladenen ($this->id) des Objektes.
        $taskId = $_GET['taskId'];
        $statement = connectToDatabase()->prepare("Delete FROM auftrag WHERE orderId=$taskId");
        $statement->execute();
        header("Location: /M307_Fruechtedoerrung/main" );
        require 'app/Views/main.view.php';
    }
}
