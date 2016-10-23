<?php
/**
 * Created by PhpStorm.
 * User: wzh
 * Date: 2016/9/25
 * Time: 下午3:36
 */
header("Content-Type:text/html;charset=utf-8");
require ("conn.php");
$id = $_GET['id'];
$sql = "select * from tb_blogs WHERE  id = $id";
$query = $mysqliConn->query($sql);
$row = mysqli_fetch_assoc($query)
?>
    <form action="updateBlogs.php" method="post" xmlns="http://www.w3.org/1999/html">
        <br>
        <br>
        <input type="hidden" name="id" value="<?php echo $id;?>">
        标题<input type="text" name="title" value="<?php echo $row['titles']?>"></br>
        内容<textarea rows="15" cols="100" name="con"><?php echo $row['contents']?></textarea></br></br>
        <input type="submit" name="sub" value="确认">
    </form>
