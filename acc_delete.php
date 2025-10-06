<?
    session_start();
    if($_SESSION['identity'] <> "dba")
    {
        header('Location: logout.php?message=請登入');
    }
    else
    {
        $method = $_GET['method'];
        $account = $_GET['account'];
        $link=mysqli_connect("localhost","root","12345678","project");
        $sql="select * from accountlist where account = '$account'";
        $rs=mysqli_query($link,$sql);
        $record=mysqli_fetch_row($rs);
        $account = $record[0];//資料庫學生流水號

        if($method=="delete")
        {
            $sql="delete from accountlist where account='$account'";
            echo $sql;
            if(mysqli_query($link, $sql)){
                header('Location:acc_index.php?message=刪除成功');
            }else{
                header('Location:acc_index.php?message=刪除失敗');
            }
        }
    }
?>