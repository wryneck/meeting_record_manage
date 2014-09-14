<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-9-14
 * Time: 下午3:45
 */
session_start();
header('Content-Type:text/html;charset=utf-8');
include_once("conn/conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="css/manager.css" type="text/css" rel="stylesheet" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>例子-会议系统-主页</title>
    <script type="text/JavaScript">
        <!--
        function MM_callJS(jsStr) { //v2.0
            return eval(jsStr)
        }
        //-->
        function logout(){
            if(confirm("确定要退出登录吗？ ")){				//输出选择框，用户可以单击“确认”或“取消”按钮
                window.open('logout.php','_parent','',false);	//如果用户确认退出，则打开logout.php页
            }else
                return false;
        }
    </script>
</head>

<?php
if(empty($_SESSION['name']) && empty($_SESSION['id'])){
    echo "<script>alert('请登录后再进行执行操作！');history.go(-1);</script>";
    exit();
}
?>
<body>
<div class="wrapper">
    <div>
        <div class="header"><img src="images/Title.png" width="960" height="200" /></div>
        <div class="userinfo">
            尊敬的：<?php echo $_SESSION['name']; ?>
            您的身份：<?php echo $_SESSION['rights'] ? '管理员' : '普通用户'; ?>
            当前日期为：<?php echo date("Y年m月d日"); ?>
            上次登录时间:<?php echo $_SESSION['last_time'] ? '------' : $_SESSION["last_time"]; ?>
            当前为第<?php echo $_SESSION['login_count']; ?>次登录
            <a href="logout.php" onclick="logout()" >退出</a>
        </div>
        <div class="main">
            <table cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td width="180">
                        <div class="leftbox">
                            <center>
                                <h4 class="h4">分类操作</h4>
                                <ul>
                                    <li><a href="manager.php?lmbs=添加会议记录">&nbsp;&nbsp;添加会议记录</a></li>
                                    <li><a href="manager.php?lmbs=浏览会议记录">&nbsp;&nbsp;浏览会议信息</a></li>
                                    <li><a href="manager.php?lmbs=查找会议记录">&nbsp;&nbsp;查找会议记录</a></li>
                                    <li><a href="manager.php?lmbs=管理用户信息">&nbsp;&nbsp;管理用户信息</a></li>
                                </ul>
                                <p>&nbsp;</p>
                                <?php
                                if($_SESSION["rights"]==1){
                                    ?>
                                    <h4 class="h4style">管理操作</h4>
                                    <ul>
                                        <li class="uli"><a href="manager.php?lmbs=用户帐户管理">&nbsp;&nbsp;用户帐户管理</a></li>   <!--添加删除冻结帐号-->
                                        <li class="uli"><a href="manager.php?lmbs=会议信息管理">&nbsp;&nbsp;会议信息管理</a></li>   <!--删除会议记录-->
                                        <li class="uli"><a href="manager.php?lmbs=部门管理">&nbsp;&nbsp;部门管理&nbsp;&nbsp;&nbsp;&nbsp;</a></li>       <!--添加删除部门-->
                                    </ul>
                                <?php
                                }
                                ?>
                            </center>
                            <center>
                                <table cellpadding="0" cellspacing="0" border="0">
                                    <tr>
                                        <td height="50">&nbsp;</td>
                                    </tr>
                                </table>
                            </center>
                        </div>
                    </td>
                    <td width="784">
                        <div class="rightbox">
                            <div class="position">当前位置>><?php
                                if(empty($_GET["lmbs"])){
                                    echo "首页";
                                }else{
                                    echo $_GET["lmbs"]; }?></div>
                            <div class="include">
                                <?php
                                $lmbs = isset($_GET["lmbs"])?$_GET["lmbs"]:'';
                                switch($lmbs){
                                    case "添加会议记录":
                                        //include("addmeeting.php");
                                        break;
                                    case "浏览会议记录":
                                        //include("viewmeeting.php");
                                        break;
                                    case "查找会议记录":
                                        //include("found.php");
                                        break;
                                    case "修改密码":
                                        //include("amendpwd.php");
                                        break;
                                    case "查找会议结果":
                                        //include("show.php");
                                        break;
                                    case "管理用户信息":
                                        //include("amendinfo.php");
                                        break;
                                    case "":
                                        //include("welcome.php");
                                        break;
                                    //管理员模式选项
                                    case "用户帐户管理":
                                        //include("acc_manager.php");
                                        break;
                                    case "会议信息管理":
                                        //include("recordmanager.php");
                                        break;
                                    case "部门管理":
                                        //include("departmanager.php");
                                        break;
                                }
                                ?>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="footer">

        </div>
    </div>
</div>
</body>
</html>
