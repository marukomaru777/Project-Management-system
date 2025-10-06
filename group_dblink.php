<?
    session_start();

    $method = $_POST['method'];
    $user_acc = $_SESSION['account'];
    $user_name = $_SESSION['name'];
    //$g_name = $_POST['g_name'];
    $st_dep = $_POST['st_dep'];
    $_SESSION['st_dep'] = $st_dep;
    
    $link=mysqli_connect("localhost","root","12345678","project");
    if($method=="ginsert")
    {
        $sql_g="insert into grouplist(st_id) values ('$user_acc')";
        echo $sql_g;

        if(mysqli_query($link, $sql_g)){
            header('Location:gro_memdbinsert.php?method=minsert');
        }
    }
?>