<?php

/**
 *
 */
class ClassClient
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    public function login($username, $password)
    {
      $query = $this->db->prepare("INSERT INTO `admin` (`username`, `password`) VALUES(?,?)");

      $query->bindValue(1, $username);
      $query->bindValue(2, $password);

      try {
          $query->execute();
          $count = $query->rowCount();

          if ($count > 0) {
              $_SESSION['login_user'] = $username;
              header("Location: index.php");
          } else {
              header("Location: login.php?error=true");
          }
      } catch (PDOException $ex) {
          $query->rollBack();
          die($ex->getMessage());
      }
    }

    public function logout()
    {
      if(session_destroy()) {
        header("Location: login.php");
      }
    }

    public function addClient($fname, $mname, $lname, $gender, $age, $guardianNumber, $dateIn)
    {
        $query = $this->db->prepare("INSERT INTO `Client` (`fname`, `mname`, `lname`, `gender`, `age`, `guardianNumber`, `dateIn`) VALUES(?,?,?,?,?,?,?)");

        $query->bindValue(1, $fname);
        $query->bindValue(2, $mname);
        $query->bindValue(3, $lname);
        $query->bindValue(4, $gender);
        $query->bindValue(5, $age);
        $query->bindValue(6, $guardianNumber);
        $query->bindValue(7, $dateIn);

        try {
            $query->execute();
            $count = $query->rowCount();

            if ($count > 0) {
                header("Location: index.php?success=true");
            } else {
                echo "Not Added";
            }
        } catch (PDOException $ex) {
            $query->rollBack();
            die($ex->getMessage());
        }

    }

    public function updateClient($fname, $mname, $lname, $gender, $age, $guardianNumber, $dateOut, $id)
    {
        $query = $this->db->prepare("UPDATE `Client` SET `fname` = (?), `mname` = (?), `lname` = (?), `gender` = (?), `age`= (?), `guardianNumber` = (?), `dateOut` = (?) WHERE `id` = (?)");

        $query->bindValue(1, $fname);
        $query->bindValue(2, $mname);
        $query->bindValue(3, $lname);
        $query->bindValue(4, $gender);
        $query->bindValue(5, $age);
        $query->bindValue(6, $guardianNumber);
        $query->bindValue(7, $dateOut);
        $query->bindValue(8, $id);

        try {
            $query->execute();
            header("Location: index.php?update=true");

        } catch (PDOException $ex) {
            $query->rollBack();
            die($ex->getMessage());
        }

    }


    public function viewClient()
    {
        $query = $this->db->prepare("SELECT * FROM `Client`");
        $get = Array();

        try {
            $query->execute();
            $get = $query->fetchAll();
            return $get;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public function viewSpecificClient($id)
    {
        $query = $this->db->prepare("SELECT * FROM `Client` WHERE `id` = ?");
        $query->bindValue(1, $id);

        $get = Array();
        try {
            $query->execute();
            $get = $query->fetch();
            return $get;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public function searchClient($name)
    {
        if ($name) {
            $query = $this->db->prepare("SELECT * FROM `Client` WHERE `fname` LIKE (?) OR `mname` LIKE (?) OR `lname` LIKE (?)");
            $query->bindValue(1, $name);
            $query->bindValue(2, $name);
            $query->bindValue(3, $name);
        } else {
            $query = $this->db->prepare("SELECT * FROM `Client`");
        }
        $get = Array();

        try {
            $query->execute();
            $get = $query->fetchAll();
            return $get;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public function viewAllInformation()
    {
        $query = $this->db->prepare("SELECT ward.*, Client.* FROM `ward` RIGHT JOIN `Client` ON `ward`.`Client_id` = `Client`.`id`");
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
