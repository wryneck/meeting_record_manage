<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-9-14
 * Time: 下午12:16
 */
session_start();
header('Content-Type:text/html;charset=utf-8');
if(!empty($_POST['submit']) and $_POST['submit']=='登录'){
    $username=$_POST['username'];
    $password=$_POST['password'];
    if(empty($username) or empty($password)){
        echo "<script>alert('用户名和密码不能为空！');history.go(-1);</script>";
        exit();
    }else{
        include('conn/conn.php');
        $user_result = $conn->Execute("select * from tb_meeting_user where userName='$username'");
        if($user_result->EOF){
            echo "<script>alert('用户名不存在！，请重新登录。');history.go(-1);</script>";
            exit();
        }

        echo($user_result->fields[6]);
        if(0 != $user_result->fields[6]){
            echo "<script>alert('该帐号已禁用,请联系管理员！');history.go(-1);</script>";
            exit();
        }

        if($username != $user_result->fields[1] || $password != $user_result->fields[2]){
            echo "<script>alert('密码错误！，请重新登录。');history.go(-1);</script>";
            exit();
        }

        $_SESSION["id"]=$user_result->fields[0];                                               //赋值给SESSION变量
        $_SESSION["name"]=$user_result->fields[1];
        $_SESSION["rights"]=$user_result->fields[5];
        $_SESSION["last_time"]=$user_result->fields[3];
        $login_date=date("Y-m-d ").date("G:i:s");                                    //当前登录时间
        $login_count = $user_result->fields[4];
        $_SESSION['login_count'] = $login_count;
        $login_count++;                                                                 //登录次数自增1
        $sql_update_str = "update tb_meeting_user set userLoginCount=$$login_count,userLastLoginDate='$login_date' where userId = $_SESSION[id]";   //更新登录次数和时间
        $conn->Execute($sql_update_str);
        header("Location:manager.php");
    }

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="css/login.css" type="text/css" rel="stylesheet" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>例子-会议系统-用户登录</title>
</head>
<body>
<form method="post" action="">
    <dl>
        <dd>
            <label>用户名</label>
            <input  id="username" type="text" name="username" onmouseover="this.style.backgroundColor='#deebef'"
                    onmouseout="this.style.backgroundColor=''"/>
        </dd>
        <dd>
            <label>密　码</label>
            <input id="password" type="password" name="password"  onmouseover="this.style.backgroundColor='#deebef'"
                   onmouseout="this.style.backgroundColor=''"/>
        </dd>
        <dd>
            <input name="submit" type="submit" value="登录"/>
            <input name="reset" type="reset" value="清空" />
        </dd>
    </dl>
</form>
</body>
</html>
