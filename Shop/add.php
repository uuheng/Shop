<html>
    <head>
        <title>商品信息管理</title>
        <meta charset='utf-8'/>
    </head>
    <body>
        <center>
            <h3>商品发布信息</h3>
            <form action="action.php?action=add" enctype="multipart/form-data" method="post">
            <table border="0" width="400">
                <tr>
                    <td align="right">名称：</td>
                    <td><input type="text" name="name"/></td>
                </tr>
                <tr>
                    <td align="right">类型：</td>
                    <td>
                        <select name="typeid">
                            <?php
                                include('dbconfig.php');
                                foreach($typelist as $key=>$val)
                                    echo "<option value='{$key}'>{$val}</option>";
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right">单价：</td>
                    <td><input type="text" name="price"/></td>
                </tr>
                <tr>
                    <td align="right">库存：</td>
                    <td><input type="text" name="total"/></td>
                </tr>
                <tr>
                    <td align="right">图片：</td>
                    <td><input type="file" name="pic" /></td>
                </tr>
                <tr>
                    <td align="right" valign="top">描述：</td>
                    <td><textarea name="note" rows="5" cols="19"></textarea></td>
                </tr>
                <tr>
                    <td align="center" colspan="2"><input type="reset" value="重置"/><input type="submit" value="添加"/></td>
                </tr>
            </table>
            </form>
        </center>
    </body>
</html>
