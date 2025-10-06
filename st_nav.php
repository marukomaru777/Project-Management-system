<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="http://code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script> <!--加入最小化版本的JS-->
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
</style>
<?
    session_start();
    if($_SESSION['account']=="")
    {
        header("Location:logout.php");
    }
?>
<nav class="navbar navbar-expand-sm navbar-default" style="justify-content: space-between; margin-left: 15%; margin-right: 15%;height: 80px;">
    <ul class="navbar-nav">
        <li style="display: flex; align-items: center;"><img src="img/fju2.gif" ></li>
        <div class="container-fluid justify-content-start" style="display: flex; align-items: center;">
            <a href="gro_index.php?method=upload"><button class="btn btn-sm btn-outline-success" type="button">上傳檔案</button></a>&emsp;
            <a href="gro_index.php"><button class="btn btn-sm btn-outline-secondary" type="button">專題分組</button></a>
        </div>
    </ul>
        
    <ul class="navbar-nav">
        <div class="container-fluid justify-content-start">
        您好，<? echo $_SESSION['name']; ?>&emsp;
        <a href="logout.php"><button id="btn-primary" class="btn btn-sm" type="button">登出</button></a>
        </div>
    </ul>
</nav>