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

    public function newReading($client_id , $billing_rate, $employee_id, $waterUsage, $totalAmount)
    {
        $query = $this->db->prepare("INSERT INTO `collection` (`Teller_id`, `Client_id`, `BillingRate_id`, `Employee_id`, `waterUsage`, `totalAmount`, `dueDate`, `isPaid`) VALUES(?,?,?,?,?,?,?,?)");
        $time = strtotime(date('Y-m-d'));
        $final = date("Y-m-d", strtotime("+1 month", $time));

        $query->bindValue(1, (string)$_SESSION['user_id']);
        $query->bindValue(2, (string)$client_id);
        $query->bindValue(3, (string)$billing_rate);
        $query->bindValue(4, (string)$employee_id);
        $query->bindValue(5, (string)$waterUsage);
        $query->bindValue(6, (string)$totalAmount);
        $query->bindValue(7, (string)$final);
        $query->bindValue(8, (string)0);

        try {
            $query->execute();
            $count = $query->rowCount();

            if ($count > 0) {
                echo "<script> location.href='meter.php?success=yes'; </script>";
            } else {
                echo "<script> location.href='meter.php?success=no'; </script>";
            }
        } catch (PDOException $ex) {
            #$query->rollBack();
            die($ex->getMessage());
        }

    }

    public function viewAllcollection()
    {
        $query = $this->db->prepare("SELECT `collection`.`created_time`, `collection`.`waterUsage`, `user`.`lastName`, `user`.`middleInitial`, `user`.`firstName`, `client`.`lastName`, `client`.`middleInitial`, `client`.`firstName`, `employee`.`firstName`, `employee`.`lastName` , `collection`.`waterUsage` , `collection`.`totalAmount`, `collection`.`dueDate` , `collection`.`isPaid` FROM `collection` RIGHT JOIN `user` ON `user`.`id` = `collection`.`Teller_id` INNER JOIN `client` ON `client`.`id` = `collection`.`Client_id` INNER JOIN `employee` ON `employee`.`id` = `collection`.`Employee_id`");
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
