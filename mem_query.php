<?
    session_start();
    if($_SESSION['identity'] <> "student")
    {
        header('Location: logout.php?message=請登入');
    }
    
    $user_acc = $_SESSION['account'];
    $user_name = $_SESSION['name'];
         
    $link=mysqli_connect("localhost","root","12345678","project");
    $sql_m="select * from memberlist where st_id = '$user_acc'";
    $rs_m=mysqli_query($link,$sql_m);
    $record=mysqli_fetch_row($rs_m);//取得該筆帳號所在的組別代碼
    $g_id = $record[1]; //所屬小組代碼
    if(isset($_GET["message"]))
    {
        $message = $_GET["message"];
        echo "<script>
                alert('$message');
                top.location='gro_index.php';
            </script>";
    }
?>
<div>
    <form action="gro_index.php" method="get">
        <div class="container-fluid d-flex align-items-center">
            <div class="col d-flex justify-content-start">
                <a href="gro_index.php?method=minsert">
                    <input class="btn btn-sm btn-danger" type ="button" value="新增組員"></input>
                </a>
            </div>
            <div class="col d-flex justify-content-center align-items-center"><p align=center style="font-size: 28px;">
                <b>專題分組名單</b>
            </div>
            <div class="col d-flex" style="justify-content: flex-end;" align=right>

            </div>
        </div>
    </form>
    <table width=80% class="table table-hover table-responsive">
        <thead align="center">
            <th width="20%">學號</th>
            <th width="40%">科系</th>
            <th width="20%">姓名</th>
            <th width="20%">編輯</th>
        </thead>
        <tbody align=center>
        <?
            $link=mysqli_connect("localhost","root","12345678","project");
            $sql="select * from memberlist where g_id='$g_id'";
            $rs=mysqli_query($link,$sql);
            while($record=mysqli_fetch_row($rs))
            {
                echo "<tr><td>$record[2]</td><td>$record[3]</td><td>$record[4]</td>";
                echo '<td><a href=gro_index.php?method=mupdate&st_id='.$record[2].'><input type ="button" value="修改"></a>
                <a href=gro_index.php?method=mdelete&st_id='.$record[2].'><input type ="button" onclick="myFunction()" value="刪除"></a>';
            }
            mysqli_close($link);
        ?>
        <script>
            /*
            function myFunction() {
            if (confirm("確認刪除<??>")) {
                alert("刪除成功");
            } else {
                alert("取消刪除");
            }
        */
        </script>
        </tbody>
    </table>
</div>  