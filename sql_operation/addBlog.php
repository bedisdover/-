<?php
/**
 * Created by PhpStorm.
 * User: wzh
 * Date: 2016/9/23
 * Time: 下午8:09
 */
header("Content-Type:text/html;charset=utf-8");
require ("conn.php");

if(!empty($_POST['sub'])){
    $titles = $_POST['title'];
    $cons = $_POST['con'];

    $sql = "insert into tb_blogs (id, titles, dates,contents) values (NULL ,'$titles',now(),'$cons')";

    if ($mysqliConn->query($sql) == TRUE) {
        echo "发布成功!";
        echo "<script> location.href='index.php'</script>";
    } else {
        echo "INSERT attempt failed" ;
    }
}

?>
<form action="addBlog.php" method="post" xmlns="http://www.w3.org/1999/html">
    <br>
    <br>
    标题<input type="text" name="title"></br>
    内容<textarea rows="15" cols="100" name="con"></textarea></br></br>
    <input type="submit" name="sub" value="发表">
</form>
