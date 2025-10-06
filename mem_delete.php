<?
    session_start();
    if($_SESSION['identity'] <> "student")
    {
        header('Location: logout.php?message=請登入');
    }
    else
    {
        $method = $_GET['method'];
        $st_id = $_GET['st_id'];
        $link=mysqli_connect("localhost","root","12345678","project");
        $sql_m="select * from memberlist where st_id = '$st_id'";
        $rs_m=mysqli_query($link,$sql_m);
        $record=mysqli_fetch_row($rs_m);
        $m_id = $record[0];//資料庫學生流水號

        if($method=="mdelete")
        {
            $sql="delete from memberlist where m_id='$m_id'";
            echo $sql;
            if(mysqli_query($link, $sql)){
                header('Location:gro_index.php?method=query&message=刪除成功');
            }else{
                header('Location:gro_index.php?method=query&message=刪除失敗');
            }
        }
    }
    
?>