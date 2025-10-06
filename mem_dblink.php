<?
    $method = $_POST['method'];
    $g_id = $_POST['g_id'];
    $st_id = $_POST['st_id']; //輸入的學號
    $st_name = $_POST['st_name'];
    $st_dep = $_POST['st_dep'];

    $link=mysqli_connect("localhost","root","12345678","project");
    $sql="select * from memberlist where st_id = '$st_id'"; //檢查此學號是否存在於資料表中
    $rs=mysqli_query($link,$sql);
    $record=mysqli_fetch_row($rs);
    $stid = $record[2]; //資料庫的學號
    $m_id = $record[0];//資料庫學生流水號

    if($method=="minsert")
    {
        if($st_id == $stid){
            header("Location: gro_index.php?method=minsert&error=此人已加入其他小組!");
            //$error = '<p style="color: red;">此人已加入其他小組!</p>';
        }else{
            if($method=="minsert"){
                $sql_m="insert into memberlist (g_id, st_id, st_name, st_dep) values ('$g_id', '$st_id', '$st_name', '$st_dep')";
                echo $sql_m;
                if(mysqli_query($link, $sql_m)){
                    header("Location:gro_index.php?method=query&message=新增成功");
                }else{
                    header("Location:gro_index.php?method=query&message=新增失敗");
                }
            }
        }
    }
    if($method=="mupdate")
    {
        $sql="update memberlist set st_id = '$st_id', st_name = '$st_name', st_dep = '$st_dep' where m_id='$m_id'";
        echo $sql;
        if(mysqli_query($link, $sql)){
            header("Location:gro_index.php?method=query&message=修改成功");
        }else{
            header("Location:gro_index.php?method=query&message=修改失敗");
        }
    }
?>