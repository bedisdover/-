<?php
/**
 * Created by PhpStorm.
 * User: wzh
 * Date: 16/9/18
 * Time: 下午10:27
 */

require ("dbconfig.php");
require ("functions.php");

$mysqliConn = new mysqli();
$mysqliConn->connect(HOST, USER, PASSWORD, DB_NAME) ;
if ($mysqliConn->connect_error) {
    die("fail: " . $conn->connect_error);
}
echo "success:";

$mysqliConn->close();