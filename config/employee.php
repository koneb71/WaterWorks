<?php

/**
 *
 */
class ClassEmployee
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    public function addEmployee($fname, $lname, $area)
    {
        $query = $this->db->prepare("INSERT INTO `employee` (`firstName`, `lastName`, `area` ) VALUES(?,?,?)");

        $query->bindValue(1, $fname);
        $query->bindValue(2, $lname);
        $query->bindValue(3, $area);

        try {
            $query->execute();
            $count = $query->rowCount();

            if ($count > 0) {
                echo "<script> location.href='employee.php?success=yes'; </script>";
            } else {
                echo "<script> location.href='employee.php?success=no'; </script>";
            }
        } catch (PDOException $ex) {
            #$query->rollBack();
            die($ex->getMessage());
        }

    }

    public function updateWorker($id, $fname, $lname, $area)
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

    public function viewAllEmployees()
    {
        $query = $this->db->prepare("SELECT `employee`.`id`, `employee`.`firstName`, `employee`.`lastName`, `employee`.`area` FROM `employee`");
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
