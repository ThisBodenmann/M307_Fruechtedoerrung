<?php
class Fruits
{
    public int $id;
    public string $frucht;

    public function __construct(int $frucht, string $name, string $phone, string $email, int $menge, date $auftragDate = date("Y/m/d"), date $returnDate)
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
}
?>