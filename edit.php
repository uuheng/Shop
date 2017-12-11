<html>
    <head>
        <title>商品信息修改</title>
        <meta charset="utf-8"/>
        <style>
            .table input{
                width: 300px;
            }
        </style>
    </head>
    <body>
        <center>
             <h3>编辑商品信息</h3>
             <form action="action.php?action=update" enctype="multipart/form-data" method="post">
                 <?php
                     require('dbconfig.php');
                     $link = mysqli_connect(HOST, USER, PASS, DBNAME) or die('连接失败');
                     $sql = "SELECT * FROM GOODS WHERE id='{$_GET['id']}'";
                     $res = mysqli_query($link, $sql);
                     $row = mysqli_fetch_assoc($res);
                 ?>
            <div class="table">
                 <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" />
                 <input type="hidden"  name="pic_old" value="<?php echo $row['pic'] ?>" />
                 <p>名称</p>
                 <input type="text" name="name" value="<?php echo $row['name'] ?>"/>
                 <br>
                 <p>类型</p>
                 <input type="text" name="typeid" value="<?php echo $row['typeid'] ?>" />
                 <br>
                 <p>单价</p>
                 <input type="text" name="price" value="<?php echo $row['price'] ?>" />
                 <br>
                 <p>库存</p>
                 <input type="text" name="total" value="<?php echo $row['total'] ?>" />
                 <br>
                 <p>修改图片</p>
                 <img src="<?php echo './uploads/'.$row['pic'] ?>" width="150px" height="100px"/>
                 <br>
                 <input type="file" name="pic"/>
                 <br>
                 <p>描述</p>
                 <textarea rows="5" cols="20" name="note"><?php echo $row['note']?></textarea>
                 <br>
             </div>
                 <input type="reset" value="重置"/>
                 &nbsp;&nbsp;
                 <input type="submit" value="修改"/>
             </form>
        </center>
    </body>
