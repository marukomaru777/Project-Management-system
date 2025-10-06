<style>
    table{
        margin-left:auto; 
        margin-right:auto;
    }
    .ColorBorder td{
        border: 5px dashed gray;
        font-size: 20px;
    }
    #container{
        background:#FFFFFF;
        width: 70%;
        height: 88vh;
        margin: 0px auto;
    }
</style>
<?
    if(isset($_GET["message"]))
    {
        if($_GET["message"] == "重複上傳")
        {
            $message = "檔案已經存在，請勿重覆上傳相同檔案";
            echo "<script>alert('$message');top.location='gro_index.php?method=upload';</script>";
        }elseif($_GET["message"] == "上傳成功")
        {
            $message = "專題終於完成啦!上傳成功!!";
            echo "<script>alert('$message');top.location='gro_index.php?method=upload';</script>";
        }else{
            $message = 'Error: '.$_GET["message"];
            echo "<script>alert('$message');top.location='gro_index.php?method=upload';</script>";
        }
        
    }
?>
<?
    session_start();
    $user_acc = $_SESSION['account'];
    $link=mysqli_connect("localhost","root","12345678","project");
    $sql_g="select * from memberlist where st_id = '$user_acc'";
    $rs_g=mysqli_query($link,$sql_g);
    $record=mysqli_fetch_row($rs_g);
    $g_id = $record[1]; //上傳者組別id
?>
<body>
    <p align=center style="font-size: 28px;"><b>上傳檔案(限.pdf)</b></p>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type=hidden name="method" value="<? echo $method?>">
        <input type=hidden name="g_id" value="<? echo $g_id; ?>">
        <table width="80%" height="300px" style="background-color: #ffffff;">
            <tr align="center" class="ColorBorder">
                <td>
                    <input type="file" name="myfile" accept=".pdf">
                </td>
            </tr>
        </table>
        <div align=center style="margin-top: 20px;">
            <input type ="submit" class="btn btn-success" value="確認上傳"></input></a>
        </div>
    </form>
    <?
        $sql="select * from uploadfile where g_id = '$g_id'";
        $rs=mysqli_query($link,$sql);
        $gid=mysqli_fetch_row($rs);
            if($gid[4]=="")
            {
                echo '<p align=center>此組未上傳任何檔案</p>';
            }else{
    ?>
    <div style="width: 80%; margin-left:auto; margin-right:auto;">
        <table class="table table-bordered">
            <thead>
                <th>小組上傳紀錄</th>
                <th>上傳時間</th>
                <th>上傳者帳號</th>
            </thead>
            <tbody>
            <?
                $rs=mysqli_query($link,$sql);
                while($record=mysqli_fetch_row($rs))
                {
                    echo "<tr><td>$record[2]</td><td>$record[3]</td><td>$record[5]</td></tr>";
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</body>