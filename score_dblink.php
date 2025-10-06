<?
    $method = $_POST['method'];
    $grade = $_POST['score'];
    $f_id = $_POST['fileid'];
    $t_acc = $_POST['t_acc'];
    $link=mysqli_connect("localhost","root","12345678","project");

    if($method=="insert")
    {
        $sql="insert into grade (f_id, grade, t_acc) values ('$f_id', '$grade', '$t_acc')";
        echo $sql;
        if(mysqli_query($link, $sql)){
            header("Location:te_index.php?message=新增成功");
        }else{
            header("Location:te_index.php?message=新增失敗");
        }
    }elseif($method=="update")
    {
        $sql="update grade set grade='$grade' where f_id='$f_id'";
        echo $sql;
        if(mysqli_query($link, $sql)){
            header("Location:te_index.php?message=修改成功");
        }else{
            header("Location:te_index.php?message=修改失敗");
        }
    }
?>