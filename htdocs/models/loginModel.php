<?php
require_once("core/baseModel.php");
require_once("registrateModel.php");
class loginModel extends Model
{
    private static $tableName ="User";

    public function rules()
    {
        return ["Login","Password"];
    }

    public static function select ($login)
    {

        try 
        {
            $conn = new PDO("mysql:host=".servername.";dbname=".dbname, username, password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
            $stmt = $conn->prepare("SELECT * FROM ".self::$tableName. " WHERE Email = :email AND Password = :password ");
            $stmt->bindParam(':email', $login->Login);
            $passHash = md5($login->Password);
            $stmt->bindParam(':password', $passHash);
            $stmt->execute();
            
            $result=$stmt->setFetchMode(PDO::FETCH_ASSOC);
            $user= new registrateModel();
            $user->tryMap($result);
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
        finally
        {
        $conn = null;
        }
        return $user;
        

    }
}


