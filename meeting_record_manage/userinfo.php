<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-9-14
 * Time: 下午6:15
 */
isset($_SESSION) || session_start();
include_once("conn/conn.php");
?>
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
<div class="userinfo">
    <?php
    $sqlstrvi="select * from tb_meeting_user where userId=$_SESSION[id]";
    $i_rstuser=$conn->Execute($sqlstrvi);
    ?>
    <table cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td width="58" align="center">尊敬的：</td>
            <td width="48" align="left"><?php echo $i_rstuser->fields[1]; ?></td>
            <td width="68">您的身份：</td>
            <td width="78" align="left">
                <?php if($i_rstuser->fields[5]==0)
                    echo "<span style=\"color:#CC99FF\">普通用户</span>";
                else if($i_rstuser->fields[5]==1)
                    echo "<span style=\"color:#FF0000\">管理员</span>";
                ?></td>
            <td>当前日期为：<span class="dates"><?php echo date("Y年m月d日");?></span>&nbsp;</td>
            <td width="78">上次登录时间:</td>
            <td width="138"><?php
                if($i_rstuser->fields[4]==1){
                    echo "------";
                }else{
                    echo $_SESSION["lasttime"];
                }
                ?>
            </td>
            <td width="40" >当前为</td>
            <td width="100" align="left">第&nbsp;<?php echo $i_rstuser->fields[4]; ?>&nbsp;次登录</td>
            <!--<td width="51"><a href="logout.php">退出登陆</a></td>-->
            <td width="51"><a href="logout.php"><img src="images/over3.png" width="49" height="19" border="0"  onclick="logout()" /></a></td>
        </tr>
    </table>
</div>