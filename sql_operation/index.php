
<form action="index.php" method="get">
    <input type="text" name="keyword">
    <input type="submit" name="submit" value="搜索">
</form>
<hr>
<?php
/**
 * Created by PhpStorm.
 * User: wzh
 * Date: 2016/9/23
 * Time: 下午9:34
 */
require ("conn.php");
$subsql = "1";

if(!empty($_GET['keyword'])){
    $keyword = $_GET['keyword'];
    $subsql = "titles like '%".$keyword."%'";
}

$sql = "select * from tb_blogs WHERE ".$subsql;
$query = $mysqliConn->query($sql);
while ($row = mysqli_fetch_assoc($query)){
?>
    <h2>标题:<a href="viewBlogs.php?id=<?php echo $row['id']?>"> <?php  echo $row['titles']."<br>";?></a>  </h2>
    <p><a href="editBlogs.php?id=<?php echo $row['id']?>">编辑 </a>|<a href="deleteBlogs.php?del=<?php echo $row['id'];?>"> 删除</a></p>
    <li>时间:<?php echo $row['dates'];?></li>
    <p>内容:<?php echo iconv_substr($row['contents'],0,20,'utf8')."......"."<br>";?></p>
    <hr>
<?php
}
?>
<a href="addBlog.php">发帖</a>