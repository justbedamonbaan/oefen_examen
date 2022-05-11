<?php 

require_once "dbh.class.php";

class Add extends Dbh
{
    public function addOnderdeel($naam, $omschrijving, $voorraadkg, $prijsperkg)
    {
        $sql = "INSERT INTO onderdelen(Naam, Omschrijving, VoorraadKg, PrijsPerKg) VALUES (?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$naam, $omschrijving, $voorraadkg, $prijsperkg]);
        header('location: ../pages/onderdelen.php');
    }
    
    public function addApparaat($naam, $omschrijving, $vergoeding, $gewichtgram)
    {
        $sql = "INSERT INTO apparaten(Naam, Omschrijving, Vergoeding, GewichtGram) VALUES (?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$naam, $omschrijving, $vergoeding, $gewichtgram]);
        header('location: ../pages/apparaten.php');
    }

    public function addOnderdeelApparaat($onderdeelID, $apparaatID, $gewicht)
    {
        $sql = "INSERT INTO onderdeelapparaat(OnderdeelID, ApparaatID, Percentage) VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$onderdeelID, $apparaatID, $gewicht]);
        header('location: ../pages/apparaat_details.php?apparaatID='. $_GET['apparaatID']);
    }
}


if (isset($_POST['addOnderdeel'])) {
    $naam = $_POST["naam"];
    $omschrijving = $_POST["omschrijving"];
    $voorraadkg = $_POST["voorraadkg"];
    $prijsperkg = $_POST["prijsperkg"];
    $addOnderdeel = new Add();
    $addOnderdeel->addOnderdeel($naam, $omschrijving, $voorraadkg, $prijsperkg);
}

if (isset($_POST['addApparaat'])) {
    $naam = $_POST["naam"];
    $omschrijving = $_POST["omschrijving"];
    $vergoeding = $_POST["vergoeding"];
    $gewichtgram = $_POST["gewichtgram"];
    $addApparaat = new Add();
    $addApparaat->addApparaat($naam, $omschrijving, $vergoeding, $gewichtgram);
}


if (isset($_POST['addOnderdeelApparaat'])) {
    $onderdeelID = $_POST["onderdeelID"];
    $apparaatID = $_GET["apparaatID"];
    $gewicht = $_POST["gewicht"];
    $addOnderdeelApparaat = new Add();
    $addOnderdeelApparaat->addOnderdeelApparaat($onderdeelID, $apparaatID, $gewicht);
}

?>