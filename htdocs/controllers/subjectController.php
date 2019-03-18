<?php

require_once("core/baseController.php");
require_once("models/subjectModel.php");

class subjectController extends Controller
{
    public function indexAction()
    {
        $this->renderView("views/subject/index.php");
    }
    
    public function createAction()
    {
        $subject = new subjectModel();
        if($_SERVER["REQUEST_METHOD"] == "GET")
        {
            $this->renderView("views/subject/create.php");
        }
        else
        {
            if($subject->tryMap($_POST))
            {
                $subject->insert();
                //var_dump($student);
            }
        }
    }

    public function selectAction()
    {
        $subjectArray = subjectModel::selectAll();
        $this->renderView("views/subject/select.php", $subjectArray);
    }

}