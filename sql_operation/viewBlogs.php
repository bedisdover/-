<?php
/**
 * Created by PhpStorm.
 * User: wzh
 * Date: 2016/9/25
 * Time: 下午9:03
 */
header("Content-Type:text/html;charset=utf-8");
require ("conn.php");
$id = $_GET['id'];
$sql_addhits = "update tb_blogs set hits = hits + 1 WHERE id = $id";
$query = $mysqliConn->query($sql_addhits);

$sql = "select * from tb_blogs WHERE  id = $id";
$query = $mysqliConn->query($sql);
$row = mysqli_fetch_assoc($query);




?>
<h1><?php echo $row['titles']?></h1>
<h2><?php echo $row['dates']?></h2>
<h3>浏览量:<?php echo $row['hits']?> </h3>
<hr>
<p>
    <?php echo $row['contents']?>
</p>