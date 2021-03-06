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

        $tempEmail = $_POST['email'];
        if (isset($tempEmail) and trim($tempEmail) != "") {
            $email = trim($tempEmail);
        } else {
            array_push($err, "Bitte valide Email eingeben!");
        }

        $tempPhone = $_POST['phone'];
        if (isset($tempPhone) and trim($tempPhone) != "" and is_numeric($tempPhone)) {
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

            $statement = connectToDatabase()->prepare("INSERT INTO auftrag (orderDate, email, fk_fruitId, name, phone, returndate, quantity) VALUES ('$currentDate', \"$email\", $fruit, \"$name\", \"$phone\", '$endDate', \"$quantity\")");
            $statement->execute();

            $message = "Erfolgreich abgesendet!";
            echo "<script type='text/javascript'>alert('$message');</script>";

            header("Location: /m307_1/06_Doerrfruechte/main" );
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
    public function onLoad() 
    {
        $taskId = $_GET['taskId'];
        $statement = connectToDatabase()->prepare("SELECT * FROM auftrag WHERE orderId=$taskId");
        $statement->execute();

        $result = $statement->fetchAll();
        
        $orderId = $result[0]['orderId'];
        $name = $result[0]['name'];
        $phone = $result[0]['phone'];
        $email = $result[0]['email'];
        $orderDate = $result[0]['orderDate'];
        $returnDate = $result[0]['returnDate'];
        $fruit = $result[0]['fk_fruitId'];
        $quantity = $result[0]['quantity'];

        require 'app/Views/edit.view.php';
    }

    public function update()
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
        if (isset($tempPhone) and trim($tempPhone) != "" and is_numeric($tempPhone)) {
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

        $completed = $_POST['completed'];
        $orderId = $_GET['taskId'];

        if (count($err) == 0) {
            $statement = connectToDatabase()->prepare("UPDATE auftrag SET name='$name', email='$email', phone='$phone', fk_fruitId=$fruit, completed=$completed WHERE orderId=$orderId");
            $statement->execute();

            $message = "Erfolgreich geändert!";
            echo "<script type='text/javascript'>alert('$message');</script>";

            echo "<script>window.location = 'http://web.kurse.ict-bz.ch/m307_1/06_Doerrfruechte/main'</script>";
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
     * Lösche einen Datensatz, entweder mit der angegebenen $id oder falls nicht angegeben, der aktuell geladene.
     */
    public static function delete()
    {
        // Falls keine $id angegeben ist, lösche den aktuell geladenen ($this->id) des Objektes.
        $taskId = $_GET['taskId'];
        $statement = connectToDatabase()->prepare("Delete FROM auftrag WHERE orderId=$taskId");
        $statement->execute();
        header("Location: /m307_1/06_Doerrfruechte/main" );
    }
}
