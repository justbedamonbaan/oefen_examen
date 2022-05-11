<?php

require("dbh.class.php");

class Data extends Dbh
{
    public function getOnderdelen()
    {
        $sql = "SELECT * FROM onderdelen";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['Naam'] . "</td>";
            echo "<td>" . $row['Omschrijving'] . "</td>";
            echo "<td>" . $row['VoorraadKg'] . "</td>";
            echo "<td>" . $row['PrijsPerKg'] . "</td>";
            echo '<td>' . "<a href='../pages/edit_onderdeel.php?onderdeelID=$row[ID]'><button type='button' class='btn btn-dark'>edit</button></a>" . '</td>';
            echo '<td>' . "<a href='../classes/delete.class.php?onderdeelID=$row[ID]'><button type='button' class='btn btn-dark'>delete</button></a>" . '</td>';
            echo "</tr>";
        }
    }

    public function getApparaten()
    {
        $sql = "SELECT * FROM apparaten";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['Naam'] . "</td>";
            echo "</a>";    
            echo "<td>" . $row['Omschrijving'] . "</td>";
            echo "<td>" . $row['Vergoeding'] . "</td>";
            echo "<td>" . $row['GewichtGram'] . "</td>";
            echo '<td>' . "<a href='../pages/edit_apparaat.php?apparaatID=$row[ID]'><button type='button' class='btn btn-dark'>edit</button></a>" . '</td>';
            echo '<td>' . "<a href='../classes/delete.class.php?apparaatID=$row[ID]'><button type='button' class='btn btn-dark'>delete</button></a>" . '</td>';
            echo '<td>' . "<a href='../pages/apparaat_details.php?apparaatID=$row[ID]'><button type='button' class='btn btn-info'>Details</button></a>" . '</td>';
            echo "</tr>";
        }
    }

    public function getOnderdeelApparaat($id)
    {
        $sql = "SELECT onderdelen.Naam AS naam, onderdeelapparaat.Percentage AS percentage, onderdeelapparaat.ApparaatID FROM onderdeelapparaat INNER JOIN onderdelen ON onderdeelapparaat.OnderdeelID=onderdelen.ID WHERE ApparaatID = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['naam'] . "</td>";  
            echo "<td>" . $row['percentage'] . "</td>";
            echo "</tr>";
        }
    }

    public function getApparaat($id)
    {
        $sql = "SELECT * FROM apparaten WHERE ID = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['Naam'] . "</td>";
            echo "</a>";    
            echo "<td>" . $row['Omschrijving'] . "</td>";
            echo "<td>" . $row['Vergoeding'] . "</td>";
            echo "</tr>";
        }
    }
}





?>