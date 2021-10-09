<?php
include_once("application/model/task.php");

class IndexController
{
    public $action;
    public $view;
    public $objTask;
    public $today;

    public function invoke($view)
    {
        $this->$today = strftime("%Y-%m-%d");
        $this->view = $view;
        
        if (isset($_GET['view'])) {
            $this->view = $_GET['view'];
        } elseif (isset($_POST['view'])) {
            $this->view = $_POST['view'];
        }
        if(isset($_POST["save"])){
            //print_r($_POST);
            $this->objTask = new task();
            $this->objTask->task_ddt = $_POST["datepicker"];
            $this->objTask->task_des = $_POST["task"];
            $this->objTask->task_active = 1;
            $this->objTask->saveTask();
        }
        if(isset($_POST["edit"])){
          // print_r($_POST);
           
            $this->objTask = new task();
            $this->objTask->task_id = $_POST["id"];
            $this->objTask->task_ddt = $_POST["datepicker"];
            $this->objTask->task_des = $_POST["task"];
            //$this->objTask->task_active = 1;
            $this->objTask->editTask();
            
        }
        $seloption = "all";
        if(isset($_POST["seloption"])) $seloption = $_POST["seloption"];
        
        $this->objTask = new task(); 
        $this->objTask->seloption = $seloption;       
        $data["tasks"] = $this->objTask->getTasks($seloption);
        switch ($this->$view) {
            default:

			case "home":
                include 'application/view/view_index.php';
                break;
        }
    }
}
?>