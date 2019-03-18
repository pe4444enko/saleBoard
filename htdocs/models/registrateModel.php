<?php

require_once("core/baseModel.php");
require_once("db.config.php");

class registrateModel extends Model
{
    private static $tableName ="User";
    public function rules()
    {
        return ["FirstName","LastName","Password","Email"];
    }
    
    public function insert()
    {
        try 
        {
            $conn = new PDO("mysql:host=".servername.";dbname=".dbname, username, password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $stmt = $conn->prepare("INSERT INTO ".self::$tableName. " (FirstName, LastName, Password, Email) 
            VALUES (:firstname, :lastname, :password, :email)");
            $stmt->bindParam(':firstname', $this->FirstName);
            $stmt->bindParam(':lastname', $this->LastName);
            $passHash = md5($this->Password);
            $stmt->bindParam(':password', $passHash);
            $stmt->bindParam(':email', $this->Email);
            $stmt->execute();
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }

    
  
}