<?php 

require("dbh.class.php");


class Delete extends Dbh
{
    public function DeleteOnderdeel($id)
    {
        $sql = "DELETE FROM onderdelen WHERE ID = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":id", $id);
        if ($stmt->execute()) {
            header("location: ../pages/onderdelen.php");
        }
    }

    public function DeleteApparaten($id)
    {
        $sql = "DELETE FROM apparaten WHERE ID = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":id", $id);
        if ($stmt->execute()) {
            header("location: ../pages/apparaten.php");
        }
    }
}

if (isset($_GET['onderdeelID'])) {
    $id = $_GET['onderdeelID'];
    $deleteOnderdeel = new Delete();
    $deleteOnderdeel->DeleteOnderdeel($id);
}

if (isset($_GET['apparaatID'])) {
    $id = $_GET['apparaatID'];
    $deleteApparaat = new Delete();
    $deleteApparaat->DeleteApparaten($id);
}



?>
