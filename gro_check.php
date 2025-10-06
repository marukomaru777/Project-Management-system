<?
    session_start();
    if($_SESSION['identity'] <> "student")
    {
        header('Location: logout.php?message=請登入');
    }
    
    $searchid = $_GET["searchid"];
    $searchtxt = $_GET["searchtxt"];

    $user_acc = $_SESSION['account'];
    $user_name = $_SESSION['name'];

    $link=mysqli_connect("localhost","root","12345678","project");

    $sql="select * from memberlist where st_id = '$user_acc'";
    $rs=mysqli_query($link,$sql);
    $record=mysqli_fetch_row($rs);//取得該筆帳號的值
    $m_id = $record[0]; //流水號
    $g_id = $record[1]; //所屬小組代碼
    $st_id = $record[2]; //學號

    $sql2="select * from grouplist where st_id = '$user_acc'";
    $rs2=mysqli_query($link,$sql2);
    $record2=mysqli_fetch_row($rs2);//取得該筆帳號的值
    $st = $record2[1]; //學號

    if($user_acc==$st_id){ //此帳號有在組員清單 (已有分組)
        header('Location:gro_index.php?method=query');
    }
    else{ //未分組
        header('Location:gro_index.php?method=ginsert');
    }
?>