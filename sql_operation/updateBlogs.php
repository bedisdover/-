<?php
/**
 * Created by PhpStorm.
 * User: wzh
 * Date: 2016/9/25
 * Time: 下午3:49
 */
header("Content-Type:text/html;charset=utf-8");
require ("conn.php");

if(!empty($_POST['sub'])){
    $titles = $_POST['title'];
    $cons = $_POST['con'];
    $id = $_POST['id'];

    $sql = "update tb_blogs set titles = '$titles',contents = '$cons' WHERE id = $id";


    if ($mysqliConn->query($sql) == TRUE) {
        echo "修改成功!";
        echo "<script> location.href='index.php'</script>>";
    } else {
        echo "update attempt failed" ;
    }


}