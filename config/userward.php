<?php

/**
 *
 */
class ClassWard
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }
  public function addWard($room, $doctorAssist, $condition, $wardType, $Patient_id)
    {
        $query = $this->db->prepare("INSERT INTO `ward` (`room`, `doctorAssist`, `condition`, `wardType`, `Patient_id`) VALUES(?,?,?,?,?)");

        $query->bindValue(1, $room);
        $query->bindValue(2, $doctorAssist);
        $query->bindValue(3, $condition);
        $query->bindValue(4, $wardType);
        $query->bindValue(5, $Patient_id);

        try {
            $query->execute();
            $count = $query->rowCount();

            if ($count > 0) {
                header("Location: view.php?success=true");
            } else {
                echo "Not Added";
            }
        } catch (PDOException $ex) {
            $query->rollBack();
            die($ex->getMessage());
        }

    }

    public function viewPatientInformation()
    {
        $query = $this->db->prepare("SELECT * FROM `ward` ");
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