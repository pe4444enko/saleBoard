<?php

require_once("core/baseController.php");
require_once("models/registrateModel.php");
require_once("models/loginModel.php");

class userController extends Controller
{
    public function indexAction()
    {
        $this->renderView("views/home/index.php");
    }
    
    public function createAction()
    {
        $student = new studentModel();
        if($_SERVER["REQUEST_METHOD"] == "GET")
        {
            $this->renderView("views/home/create.php");
        }
        else
        {
            if($student->tryMap($_POST))
            {
                $student->insert();
                //var_dump($student);
            }
        }
    }

    public function viewAllAction()
    {
        $studentsArray = studentModel::selectAll();
        $this->renderView("views/home/viewAll.php", $studentsArray);
    }

    public function deleteAction()
    {
        $ID=$_POST["ID"];

        $student= studentModel::selectByID($ID);

        $student->delete();
        $this->renderView ("views/home/delete.php", $studentsArray);
    }

    public function logInAction()
    {
        $this->renderView("views/user/Login.php");

        $Login= new loginModel();

        if($_SERVER["REQUEST_METHOD"] == "GET")
        {
            $this->renderView("views/user/Login.php");
        }
        else
        {
            if($Login->tryMap($_POST))
            {
                $user= loginModel::select($Login);
                var_dump($user);
            }
        }

    }

    public function registrateAction()
    {
        $this->renderView("views/user/registrate.php");

        $registrate = new registrateModel();

        if($_SERVER["REQUEST_METHOD"] == "GET")
        {
            $this->renderView("views/user/registrate.php");
        }
        else
        {
            if($registrate->tryMap($_POST))
            {
                $registrate->insert();
                //var_dump($student);
            }
        }
    }

    public function settingsAction()
    {
        $this->renderView("views/user/settings.php");

    }

 
}