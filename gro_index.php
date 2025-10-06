<?
    require("st_nav.php");

    $method = $_GET["method"];
    session_start();
    if($_SESSION['identity'] <> "student")
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
    <title>學生專題系統</title>
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
                case "ginsert": include "gro_insert.php"; break;
                case "minsert": include "mem_insert.php"; break;
                case "query": include "mem_query.php"; break;
                case "mupdate": include "mem_update.php"; break;
                case "mdelete": include "mem_delete.php"; break;
                case "upload": include "file_upload.php"; break;
                default: include "gro_check.php";
            }
            ?>
        </div>
    </div>
</body>
</html>