<?php

require_once("core/baseModel.php");
require_once("db.config.php");

class studentModel extends Model
{
    private static $tableName ="Students";
    public function rules()
    {
        return ["ID","FirstName","LastName","Birthday","Email"];
    }
    
    public function insert()
    {
        try 
        {
            $conn = new PDO("mysql:host=".servername.";dbname=".dbname, username, password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $stmt = $conn->prepare("INSERT INTO".self::$tableName. "(FirstName, LastName, Email,Birthday) 
            VALUES (:firstname, :lastname, :email, :birthday)");
            $stmt->bindParam(':firstname', $this->FirstName);
            $stmt->bindParam(':lastname', $this->LastName);
            $stmt->bindParam(':email', $this->Email);
            $stmt->bindParam(':birthday', $this->Birthday);
            $stmt->execute();
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
    public static function selectAll()
    {
        $studentsArray =array();
        try 
        {
            $conn = new PDO("mysql:host=".servername.";dbname=".dbname, username, password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
            $sql = "SELECT * FROM ".self::$tableName;
            foreach ($conn->query($sql) as $row){
                $student = new studentModel();

                $student->tryMap($row);

                array_push($studentsArray, $student);
            }
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
        finally
        {
        $conn = null;
        }

        return $studentsArray;
    }

    public function delete()
    {
        try 
        {
            $conn = new PDO("mysql:host=".servername.";dbname=".dbname, username, password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
            $sql = "DELETE FROM ".self::$tableName." WHERE ID = :ID";
            $stmt->bindParam(':id', $this->ID);

            $stmt->execute();
            foreach ($conn->query($sql) as $row){
                $student = new studentModel();

                $student->tryMap($row);

                array_push($studentsArray, $student);
            }
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
        finally
        {
        $conn = null;
        }

        return $studentsArray;
    }

}