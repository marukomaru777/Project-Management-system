<?
    $method = $_POST['method'];
    $acc = $_POST['account'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $identity = $_POST['identity'];
    $link=mysqli_connect("localhost","root","12345678","project");
    $sql="select account from accountlist where account = '$acc'"; //檢查此帳號是否存在於資料表中
    $rs=mysqli_query($link,$sql);
    $record=mysqli_fetch_row($rs);
    $account = $record[0]; //資料庫的帳號

    if($method=="insert")
    {
        if($account == $acc){
            header("Location: acc_index.php?method=insert&error=此帳號已存在!");
        }else{
            $sql_m="insert into accountlist (account, password, name, identity)
            values ('$acc', '$password', '$name', '$identity')";
            echo $sql_m;
            if(mysqli_query($link, $sql_m)){
                header('Location:acc_index.php?method=query&message=新增成功');
            }else{
                header('Location:acc_index.php?method=query&message=新增失敗');
            }
        }
    }
    if($method == "update")
    {
        $sql="update accountlist set password = '$password' , name = '$name', identity = '$identity' 
        where account='$acc'";
        echo $sql;
        if(mysqli_query($link, $sql)){
            header("Location:acc_index.php?method=query&message=修改成功");
        }else{
            header("Location:acc_index.php?method=query&message=修改失敗");
        }
    }
?>