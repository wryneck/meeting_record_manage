<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-9-14
 * Time: 上午10:57
 */

$db_path=realpath('db\db_meeting.mdb');

include('adodb5/adodb.inc.php');
$db = ADONewConnection('access');
$db->Pconnect("Driver={Microsoft Access Driver (*.mdb)};Dbq=$db_path");
$result_set = &$db->Execute('select * from tb_meeting_depart');
if(!$result_set){
    echo($db->ErrorMsg());
}else{
?>
<table>
    <tr>
        <th>1</th>
        <th>2</th>
    </tr>
<?php
    while(!$result_set->EOF){
?>
    <tr>
        <td><?php echo $result_set->fields[0]; ?></td>
        <td><?php echo $result_set->fields[1]; ?></td>
    </tr>
<?php
        $result_set->MoveNext();
    }
?>
</table>
<?php
}
$result_set->close();
$db->close();
?>