<?php
class Fruits
{
    public $id;
    public $name;

    public function __construct($id = null, $name = null)
    {
        $this->id = $id;
        $this->name = $name;
      
        return $this;
    }

    public static function getFruitById($id)
    {
        $statement = connectToDatabase()->prepare('SELECT * FROM fruits WHERE id = :id');
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $results = $statement->fetch();

        return Fruits::ResultToFruits($results);
    }
?>