<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-9-14
 * Time: 上午11:50
 */
$root_path=substr(__DIR__,0,strlen(__DIR__)-4);

$db_path = $root_path.'db/db_meeting.mdb';
include $root_path.'adodb5/adodb.inc.php';								//载入adodb
$conn = ADONewConnection('access');							//建立accessl连接
$conn->Pconnect("Driver={Microsoft Access Driver (*.mdb)};Dbq=$db_path");
//$conn->execute("set names gb2312"); //SET NAMES UTF8