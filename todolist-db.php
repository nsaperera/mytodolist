<?php
require_once 'application/model//DB.php';

$option = $_GET["option"];
if($option=="DelId"){
    $tskId= $_GET["id"];

    $sql = "DELETE from task WHERE task_id='$tskId'";
    $dbcon = new DB();
    $result = $dbcon->query($sql);
    echo "OK";
}elseif($option=="chgStatus"){
    $tskId  = $_GET["id"];
    $status = $_GET["status"];

    $sql = "UPDATE task SET task_active='$status' WHERE task_id='$tskId'";
    $dbcon = new DB();
    $result = $dbcon->query($sql);
    echo "OK";
}
?>