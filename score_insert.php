<?
    session_start();
    if($_SESSION['identity'] <> "teacher")
    {
        header('Location: logout.php?message=請登入');
    }
    $user_acc = $_SESSION['account'];
    //$user_name = $_SESSION['name'];

    $fileid = $_GET['fileid']; //專題檔案流水號
    $link=mysqli_connect("localhost","root","12345678","project");
    $sql="select * from uploadfile where f_id = '$fileid'";
    $rs=mysqli_query($link,$sql);
    $record=mysqli_fetch_row($rs);
    $folder = $record[1]; //檔案資料夾
    $val = $record[2]; //檔名filename
    //去除副檔名
    $filename = $val;
    if (false !== $pos = strripos($filename, '.')) {
        $filename = substr($filename, 0, $pos);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>專題評分</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</head>
<body>
    <div>
        <form action="score_dblink.php" method="post">
        <input type=hidden name="method" value="<? echo $_GET['method']; ?>">
        <input type=hidden name="t_acc" value="<? echo $user_acc; ?>">
        <input type=hidden name="fileid" value="<? echo $fileid; ?>">
        <table class="table table-hover">
            <p align=center style="font-size: 28px;"><b>專題評分</b></p>
            <thead>
                <td width=45%></td>
                <td width=55%></td>
            </thead>
            <tbody>
                <tr>
                    <td align=right><b>專題名稱：</b></td>
                    <td><? echo $filename;?></td>
                </tr>
                <tr>
                    <td align=right><b>下載檔案：</b></td>
                    <td><a href="download.php?folder=<? echo $folder?>&filename=<? echo $val;?>">下載</a></td>
                </tr>
                <tr>
                    <td align=right><b>分數：</b></td>
                    <td><input type="text" name="score" placeholder="請給分" required></td>
                </tr>
            </tbody>
            <tfoot align=center>
                <td colspan=2>
                    <input type ="button" onclick="history.back()" value="取消"></input>&ensp;
                    <input type ="submit" value="確認"></input></a>
                </td>
            </tfoot>
        </table>
    </form>
</div>
</body>
</html>