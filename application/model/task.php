<?php
require_once 'DB.php';
class task{
    public $task_id;
    public $task_ddt;
    public $task_des;
    public $task_active;
    public $seloption;

    public function getTasks($seloption){
        $selsql = "";        
        if($seloption!="all" && $seloption>=0) $selsql = "WHERE task_active='$seloption'";
            
        $sql = "select * from task $selsql order by task_ddt DESC, task_id desc";
        
        $dbcon = new DB();
        $result = $dbcon->query($sql);
		$list = new ArrayObject();
		if (!is_bool($result) && $result->rowCount() > 0) {
			while ($row = $result->fetch()) {
				$obj = new task();

                $obj->task_id = $row["task_id"];
                $obj->task_ddt = $row["task_ddt"];
                $obj->task_des = $row["task_des"];
                $obj->task_active = $row["task_active"];

                $list[$obj->task_id] = $obj;
                //echo $obj->task_des;
            }
        }
        return $list;
    }
    public function saveTask(){
        $sql = "INSERT INTO task (task_ddt,task_des,task_active) VALUES(
                '".$this->task_ddt."','".$this->task_des."',1)";
        $dbcon = new DB();
        $result = $dbcon->query($sql);
    }
    public function editTask(){
        $sql = "UPDATE task set 
            task_ddt = '".$this->task_ddt."',
            task_des = '".$this->task_des."'
            WHERE 
            task_id='".$this->task_id."'";
        
        $dbcon = new DB();
        $result = $dbcon->query($sql);
        //editTask

    }
    
    

}
?>