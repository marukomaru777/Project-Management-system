<?php
    $method = $_POST['method'];
    session_start();
    $user_acc = $_SESSION['account']; //上傳帳號
    $g_id = $_POST['g_id']; //上傳組別
    $uploads_dir = 'upload'; //上傳資料夾名稱
    
    $link=mysqli_connect("localhost","root","12345678","project");
    if ($_FILES["myfile"]["error"] > 0){
        header('location: gro_index.php?method=upload&message='.$_FILES["myfile"]["error"]);
    }else{
        $filename = $_FILES["myfile"]["name"];
        if (file_exists("$uploads_dir/" . $_FILES["myfile"]["name"])){
            header("location: gro_index.php?method=upload&message=重複上傳");
        }
        elseif($method=="upload"){
            move_uploaded_file($_FILES["myfile"]["tmp_name"],"$uploads_dir/".$_FILES["myfile"]["name"]);
            $sql_m="insert into uploadfile (folder, file, g_id, st_id) values ('$uploads_dir', '$filename', '$g_id', '$user_acc')";
            echo $sql_m;
            if(mysqli_query($link, $sql_m)){
                header("location: gro_index.php?method=upload&message=上傳成功");
            }
        }
    }
?>