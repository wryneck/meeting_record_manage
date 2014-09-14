<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-9-14
 * Time: 下午3:55
 */
session_start();
if(isset($_SESSION["name"]) and isset($_SESSION["id"]) and isset($_SESSION["rights"])){
    header("Location:manager.php");
}else{
    header("Location:login.php");
}
?>