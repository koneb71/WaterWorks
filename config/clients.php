<?php

/**
 *
 */
class ClassClients
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    public function addClient($accNum, $meterSerial, $firstname, $lastname, $mInitial, $mobileNum, $rateClass, $businessArea, $streetAdd, $city, $postal)
    {
        $query = $this->db->prepare("INSERT INTO `client` (`accountNumber`, `meterSerialNumber`, `firstName`, `lastName`, `middleInitial`, `mobileNumber`, `rateClass`, `businessArea`, `streetAddress`, `city`, `postalCode` ) VALUES(?,?,?,?,?,?,?,?,?,?,?)");

        $query->bindValue(1, $accNum);
        $query->bindValue(2, $meterSerial);
        $query->bindValue(3, $firstname);
        $query->bindValue(4, $lastname);
        $query->bindValue(5, $mInitial);
        $query->bindValue(6, $mobileNum);
        $query->bindValue(7, $rateClass);
        $query->bindValue(8, $businessArea);
        $query->bindValue(9, $streetAdd);
        $query->bindValue(10, $city);
        $query->bindValue(11, $postal);

        try {
            $query->execute();
            $count = $query->rowCount();

            if ($count > 0) {
                echo "<script> location.href='client.php?success=yes'; </script>";
            } else {
                echo "<script> location.href='client.php?success=no'; </script>";
            }
        } catch (PDOException $ex) {
            #$query->rollBack();
            die($ex->getMessage());
        }

    }

    public function updateClient($id, $fname, $lname, $area)
    {
        $query = $this->db->prepare("UPDATE `Worker` SET `firstName` = (?), `lastName` = (?), `area` = (?) WHERE `id` = (?)");

        $query->bindValue(1, $fname);
        $query->bindValue(2, $lname);
        $query->bindValue(3, $area);
        $query->bindValue(4, $id);

        try {
            $query->execute();
            header("Location: employee.php?updated=true");
        } catch (PDOException $ex) {
            $query->rollBack();
            die($ex->getMessage());
        }

    }

    public function viewAllClient()
    {
        $query = $this->db->prepare("SELECT `client`.`id`, `client`.`accountNumber`, `client`.`meterSerialNumber`, `client`.`firstName`, `client`.`lastName`, `client`.`middleInitial`, `client`.`mobileNumber`, `client`.`rateClass`, `client`.`businessArea`, `client`.`streetAddress`, `client`.`city`, `client`.`postalCode` FROM `client`");
        $get = Array();

        try {
            $query->execute();
            $get = $query->fetchAll();
            return $get;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

}
