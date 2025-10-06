<?
    require("dba_nav.php");
    $method = $_GET["method"];
    session_start();
    if($_SESSION['identity'] <> "dba")
    {
        header('Location: logout.php?message=請登入');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>專題系統管理</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <style>
        #btn-primary {
          color:#52525b;
          background-color: #dcdde1;
          border-color:#dcdde1;
        }
        #btn-primary:hover,
        #btn-primary:active:hover, #btn-primary.active:hover{
          color:#ffffff;
          background-color: #3f564c;
          border-color: #3f564c;
        }
        #main{
            position: absolute;
            top: 90px;
            bottom: auto;
            left: 0;
            right: 0;
            width: 100%;
            background:#dcdde1;
        }
        table{
            margin-left:auto; 
            margin-right:auto;
        }
        #container{
            background:#FFFFFF;
            width: 70%;
            min-height: 88vh;
            margin: 0px auto;
        }
        th{
            text-align: center;
        }
    </style>
</head>
<body>
    <div id="main">
        <div width="80%" id="container">
            <?
            switch($method)
            {
                case "insert": include "acc_insert.php"; break;
                case "update": include "acc_update.php"; break;
                case "delete": include "acc_delete.php"; break;
                default: include "acc_query.php";
            }
            ?>
        </div>
    </div>
</body>
</html>