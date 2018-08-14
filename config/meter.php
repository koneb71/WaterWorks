<?php

/**
 *
 */
class ClassMeter
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    public function newReading($accountant, $client_id , $employee_id, $waterUsage)
    {
        $query = $this->db->prepare("INSERT INTO `meterreading` (`Accountant_id`, `Client_id`, `Employee_id`, `waterUsage`) VALUES(?,?,?,?)");

        $query->bindValue(1, $accountant);
        $query->bindValue(2, $client_id);
        $query->bindValue(3, $employee_id);
        $query->bindValue(4, (int)$waterUsage);

        try {
            $query->execute();
            $count = $query->rowCount();

            if ($count > 0) {
                header("Location: meter.php?success=yes");
            } else {
                header("Location: meter.php?success=no");
            }
        } catch (PDOException $ex) {
            #$query->rollBack();
            die($ex->getMessage());
        }

    }

    public function viewAllMeterReading()
    {
        $query = $this->db->prepare("SELECT `meterreading`.`created_date`, `meterreading`.`waterUsage`, `user`.`lastName`, `user`.`middleInitial`, `user`.`firstName`, `client`.`lastName`, `client`.`middleInitial`, `client`.`firstName`, `employee`.`firstName`, `employee`.`lastName` FROM `meterreading` RIGHT JOIN `user` ON `user`.`id` = `meterreading`.`Accountant_id` INNER JOIN `client` ON `client`.`id` = `meterreading`.`Client_id` INNER JOIN `employee` ON `employee`.`id` = `meterreading`.`Employee_id`");
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
