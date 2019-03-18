<?php

require_once("core/baseController.php");
require_once("models/studentModel.php");

class homeController extends Controller
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
}