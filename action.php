<?php
// echo "asdfasdf";
require("dbconfig.php");
require("functions.php");
date_default_timezone_set("PRC");
// mysqli_select_db(DBNAME);
// var_dump($link);
// echo DBNAME;

switch($_GET['action']){
    case "add":
        Add();
        // echo "123123";
        break;
    case "del":
        Del();
        break;
    case "update":
        Update();
        break;
    }


 ?>
