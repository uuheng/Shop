<html>
<head>
    <meta charset="utf-8"/>
    <title>商品信息管理</title>
</head>
<body>
<center>
    <?php include("menu.php"); ?>
    <h3>浏览商品信息</h3>
    <table border="1" width="700">
    <tr>
        <th>编号</th>
        <th>名称</th>
        <th>图片</th>
        <th>单价</th>
        <th>库存</th>
        <th>添加时间</th>
        <th>操作</th>
    </tr>
    <?php
        require("dbconfig.php");
        date_default_timezone_set("PRC");
        $link = mysqli_connect(HOST, USER, PASS, DBNAME) or die("连接数据库失败");
        // mysqli_select_db($link, DBNAME);
        // var_dump($link);
        $sql = "SELECT * FROM goods";
        $res = mysqli_query($link, $sql);
        // var_dump($res);
        while($row = mysqli_fetch_assoc($res)){
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td><img src='./uploads/{$row['pic']}'/></td>";
            echo "<td>{$row['price']}</td>";
            echo "<td>{$row['total']}</td>";
            echo "<td>".date("Y-m-d H:i:s", $row['addtime'])."</td>";
            echo "<td><a href='edit.php?id={$row['id']}'>修改</a>&nbsp;&nbsp;<a href='action.php?action=del&id={$row['id']}&picname={$row['pic']}'>删除</a></td>";
            echo "</tr>";
        }
        mysqli_free_result($res);
        mysqli_close($link);
    ?>
    </table>
</center>
</body>
</html>
