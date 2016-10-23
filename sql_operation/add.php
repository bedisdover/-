<html>
<head>
    <title>
        商品信息
    </title>

</head>
<body>
<center>
    <?php
    include ("menu.php");
    ?>
    <h3>商品发布</h3>
    <form action="action.php?action=add" enctype="multipart/form-data" method="post">
        <table >
            <tr>
                <td>名称:</td>
                <td><input type="text" name="name" style="width: 100%"></td>
            </tr>
            <tr>
                <td>类型:</td>
                <td>
                    <select style="width: 100%" name="type">
                        <?php
                        include ("dbconfig.php");
                        foreach ($typeList as $key=>$v){
                            echo "<option value = '$key' style='align-items:flex-end'>$v</option> ";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>单价:</td>
                <td><input type="text" name="price" style="width: 100%"></td>
            </tr>
            <tr>
                <td>库存:</td>
                <td><input type="text" name="total" style="width: 100%"></td>
            </tr>
            <tr>
                <td>图片:</td>
                <td><input type="file" name="pic"></td>
            </tr>
            <tr>
                <td>描述:</td>
                <td><textarea rows="5" cols="40" name="note"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="提交">
                    <input type="reset" value="重置">
                </td>
            </tr>
        </table>

    </form>

</center>


</body>
</html>