<?
    session_start();
    if($_SESSION['identity'] <> "teacher")
    {
        header('Location: logout.php?message=請登入');
    }

    if(isset($_GET["message"]))
    {
        $message = $_GET["message"];
        echo "<script>alert('$message');top.location='te_index.php';</script>";
    }
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
                order: [[ 3, 'asc' ], [ 0, 'desc' ]]
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
            <div class="col d-flex justify-content-center lign-items-center"><p align=center style="font-size: 28px;"><b>專題一覽</b></p></div>
            <div class="col d-flex" style="justify-content: flex-end;" ></div>
        </div>
	</form>

    <table class="table table-hover display" id="file" cellspacing="0" width="100%">
        <thead align=center>
            <th>#</th>
            <th width=40%>篇名</th>
            <th width=20%>組別成員</th>
            <th width=15%>上傳時間</th>
            <th>分數</th>
            <th>編輯</th>
        </thead>
        <tbody>
        <?
	    $link=mysqli_connect("localhost","root","12345678","project");
	    $sql="select * from uploadfile";
	    $rs=mysqli_query($link,$sql);

	    while($record=mysqli_fetch_row($rs))
	    {
            //取得檔案名稱
            $filename = $record[2];
            if (false !== $pos = strripos($filename, '.')) {
                $filename = substr($filename, 0, $pos); //去除檔案副檔名
            }
	        echo "<tr>
            <td align=center>$record[0]</td>
            <td>$filename</td>"; //專題編號&篇名

            $mem = array(); //mem陣列存小組成員
            $sql_m="select st_name from memberlist where g_id='$record[4]'"; //取得組別成員
            $rs_m=mysqli_query($link,$sql_m);
            
            while($re_m=mysqli_fetch_row($rs_m)){
                array_push($mem, $re_m[0]); //將組員加入mem陣列
            }
            echo "<td>".join("、",$mem)."</td>"; //將專題作者以"、"分隔
            echo "<td align=center>$record[3]</td>"; //上傳時間

            $sql_g="select grade from grade where t_acc='$user_acc' and f_id='$record[0]'"; //成績
            $rs_g=mysqli_query($link,$sql_g);
            $r=mysqli_fetch_row($rs_g);
            $grade = $r[0]; //老師對該專題的評分成績
            if($grade == ""){ //判斷是否已評分
                //未評分
                echo '<td align="center">未評分</td>
                <td align="center"><a href=te_index.php?method=insert&fileid='.$record[0].'><input type="button" value="評分"></a></td></tr>';
            }else{
                //已評分
                echo '<td align="center">'.$grade.'</td>';
                echo '<td align="center"><a href=te_index.php?method=update&fileid='.$record[0].'&grade='.$grade.'><input type="button" value="修改"></a></td></tr>';
                
            }
        }

	    mysqli_close($link);
	    ?>
        </tbody>
        <tfoot>
            <td colspan="6" align=center></td>
        </tfoot>
    
 </body>
</html>
