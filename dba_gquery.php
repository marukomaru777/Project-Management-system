<?
    session_start();
    if($_SESSION['identity'] <> "dba")
    {
        header('Location: logout.php?message=請登入');
    }

    $fileid = $_GET['fileid']; //專題檔案流水號
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Generator" content="EditPlus®">
    <meta name="Author" content="">
    <meta name="Keywords" content="">
    <meta name="Description" content="">
    <title>專題評分系統</title>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" class="init">
        $(document).ready(function() {
            $('#file').DataTable( {
                order: [[ 3, 'desc' ], [ 0, 'asc' ]]
            } );
        } );
    </script>
    <style>
        table{
            Font-size: 14px;
        }
    </style>
 </head>
 <body>
    <form action="te_index.php" method=get>
        <div class="container-fluid d-flex align-items-center">
            <div class="col"></div>
            <div class="col d-flex justify-content-center lign-items-center"><p align=center style="font-size: 28px;"><b>專題分數一覽</b></p></div>
            <div class="col d-flex" style="justify-content: flex-end;" >
                <input class="btn btn-outline-dark" type ="button" onclick="history.back()" value="回到專題管理"></input>
            </div>
        </div>
	</form>
    <?
        $link=mysqli_connect("localhost","root","12345678","project");
        $sql_f="select file from uploadfile where f_id = '$fileid'";
        $rs_f=mysqli_query($link,$sql_f);
        $f_name=mysqli_fetch_row($rs_f);
        $filename = $f_name[0]; //檔名filename
        //去除副檔名
        if (false !== $pos = strripos($filename, '.')) {
            $filename = substr($filename, 0, $pos);
        }
    ?>
    <p align=center>篇名：<? echo $filename;?></p>
    <table class="table table-hover display" id="file" cellspacing="0" width="100%">
        <thead align=center>
            <th>#</th>
            <th>評分老師帳號</th>
            <th>評分老師姓名</th>
            <th>分數</th>
        </thead>
        <tbody align=center>
        <?
        $sql="select * from grade where f_id = '$fileid'"; //專題名稱、成績
        $rs=mysqli_query($link,$sql);
	    while($record=mysqli_fetch_row($rs)){
            //找該分數評分老師名字
            $t_acc = $record[3];
            $sql_t="select name from accountlist where account = '$t_acc'"; //老師名字
            $rs_t=mysqli_query($link,$sql_t);
            $record_name=mysqli_fetch_row($rs_t);
            $t_name = $record_name[0]; //該分數評分老師名字
            echo "<tr><td>$record[0]</td><td>$record[3]</td><td>$t_name</td><td>$record[2]</td></tr>";
        }
	    mysqli_close($link);
	    ?>
        </tbody>
        <tfoot>
            <th colspan=4></th>
        </tfoot>
 </body>
</html>