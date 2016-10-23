<?php
/**
 * Created by PhpStorm.
 * User: wzh
 * Date: 2016/9/23
 * Time: 下午7:14
 */
header("Content-Type:text/html;charset=utf-8");
require ("dbconfig.php");

$mysqliConn = new mysqli();
$mysqliConn->connect(HOST, USER, PASSWORD, DB_NAME) ;
if ($mysqliConn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
//$mysqliConn->close();