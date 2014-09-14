<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-9-14
 * Time: 下午6:22
 */
isset($_SESSION) || session_start();
session_unset();
session_destroy();
header("Location:login.php");
exit();