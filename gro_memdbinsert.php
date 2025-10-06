<?
    session_start();
    if($_SESSION['identity'] <> "student")
    {
        header('Location: logout.php?message=請登入');
    }
    
    $user_acc = $_SESSION['account'];
    $user_name = $_SESSION['name'];
    $st_dep = $_SESSION['st_dep'];

    $link=mysqli_connect("localhost","root","12345678","project");
    $sql_g="select * from grouplist where st_id = '$user_acc'";
    $rs_g=mysqli_query($link,$sql_g);
    $record=mysqli_fetch_row($rs_g);
    $g_id = $record[0];

    $sql_m="insert into memberlist (g_id, st_id, st_name, st_dep) values ('$g_id', '$user_acc', '$user_name', '$st_dep')";
    echo $sql_m;
    if(mysqli_query($link, $sql_m)){
        header('Location:gro_index.php?method=query');
    }
?>