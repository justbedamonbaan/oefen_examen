<?php 

require("dbh.class.php");

class Opties extends Dbh
{
    public function OnderdeelOpties()
    {
        $sql = "SELECT * FROM onderdelen";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        //HIERMEE WORD ALLE INFORMATIE VAN DE GERECHTCATEGORIEN TABLE OPGEHAALD EN GEDISPLAYD
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value=' . $row["ID"] .'>'. $row["Naam"] . '</option>';
        }
    }
}








?>