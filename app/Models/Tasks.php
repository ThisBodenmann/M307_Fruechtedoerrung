<?php
class Tasks
{
    public $auftragId;
    public $frucht;
    public $name;
    public $phone;
    public $email;
    public $menge;
    public $auftragDate;
    public $returnDate;


    public function __construct($frucht = null, $name = null, $phone = null, $email = null, $menge = null,$auftragDate = null,$returnDate = null)
    {
        $this->frucht = $frucht;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->menge = $menge;
        $this->auftragDate = $auftragDate;
        $this->returnDate = $returnDate;

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
            $dbr['name'],
            $dbr['email'],
            $dbr['phone'],
            $dbr['frucht'],
            $dbr['menge'],
            $dbr['auftragDate'],
            $dbr['returnDate'],
        );
    }
    /**
     * Erstellt einen neuen Eintrag in der Datenbank.
     */
    public function create(): int
    {
        // Dein Code...
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
