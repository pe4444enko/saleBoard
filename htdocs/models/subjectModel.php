<?php

require_once("core/baseModel.php");
require_once("db.config.php");

class subjectModel extends Model
{
    private static $tableName ="Subject";
    public function rules()
    {
        return ["ID", "Name","Duration"];
    }
    
    public function insert()
    {
        try 
        {
            $conn = new PDO("mysql:host=".servername.";dbname=".dbname, username, password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $stmt = $conn->prepare("INSERT INTO ".self::$tableName. " (Name, Duration) 
            VALUES (:name, :duration)");
            $stmt->bindParam(':name', $this->Name);
            $stmt->bindParam(':duration', $this->Duration);
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
        $subjectArray =array();
        try 
        {
            $conn = new PDO("mysql:host=".servername.";dbname=".dbname, username, password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
            $sql = "SELECT * FROM ".self::$tableName;
            foreach ($conn->query($sql) as $row){
                $subject = new subjectModel();

                $subject->tryMap($row);

                array_push($subjectArray, $subject);
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

        return $subjectArray;
    }
}