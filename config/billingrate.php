<?php

/**
 *
 */
class ClassBillingRate
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    public function addRate($name, $rate)
    {
        $query = $this->db->prepare("INSERT INTO `billingrate` (`name`, `rate`) VALUES(?,?)");

        $query->bindValue(1, $name);
        $query->bindValue(2, $rate);

        try {
            $query->execute();
            $count = $query->rowCount();

            if ($count > 0) {
                echo "<script> location.href='billing-rate.php?success=yes'; </script>";
            } else {
                echo "<script> location.href='billing-rate.php?success=no'; </script>";
            }
        } catch (PDOException $ex) {
            #$query->rollBack();
            die($ex->getMessage());
        }

    }

    public function updateBillingRate($id, $fname, $lname, $area)
    {
        $query = $this->db->prepare("UPDATE `Worker` SET `firstName` = (?), `lastName` = (?), `area` = (?) WHERE `id` = (?)");

        $query->bindValue(1, $fname);
        $query->bindValue(2, $lname);
        $query->bindValue(3, $area);
        $query->bindValue(4, $id);

        try {
            $query->execute();
            header("Location: billing-rate.php?updated=true");
        } catch (PDOException $ex) {
            $query->rollBack();
            die($ex->getMessage());
        }

    }

    public function viewAllRates()
    {
        $query = $this->db->prepare("SELECT * FROM `billingrate`");
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
