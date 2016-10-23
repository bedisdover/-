<?php
/**
 * Created by PhpStorm.
 * User: wzh
 * Date: 2016/9/23
 * Time: 下午10:08
 */
header("Content-Type:text/html;charset=utf-8");
require ("conn.php");
$id = $_GET['del'];
$sql = "delete from tb_blogs WHERE  id = $id";
if ($mysqliConn->query($sql) == TRUE) {
    echo "删除成功!";
    echo "<script> location.href='index.php'</script>";
} else {
    echo "delete attempt failed" ;
}