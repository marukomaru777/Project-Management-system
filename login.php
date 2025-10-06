<?
    if(isset($_GET["message"]))
    {
        $message = $_GET["message"];
        echo "<script>alert('$message');top.location='login.php';</script>";
    }
    session_start();
    $error = "";
    if(isset($_POST['acc'])){
        //接輸入值
        $acc = $_POST['acc'];
        $acc = trim($acc);
        $pas = $_POST['pas'];

        //連結資料庫
        $link=mysqli_connect("localhost","root","12345678","project");
        $sql="select * from accountlist where account = '$acc'";
        $rs=mysqli_query($link,$sql);
        $record=mysqli_fetch_row($rs);//取得該筆帳號的值

        if($acc == $record[0]){
            if($pas == $record[1]){
                $_SESSION['account'] = $record[0];
                $_SESSION['name'] = $record[2];
                $_SESSION['identity'] = $record[3];
                if($record[3] == "student"){
                    header('Location:gro_index.php?method=upload');
                }
                elseif($record[3] == "teacher"){
                    header('Location:te_index.php');
                }
                elseif($record[3] == "dba"){
                    header('Location:acc_index.php');
                }
            }else{
                $error = '<p style="color: red;" align=center>密碼錯誤</p>';
            }
        }else{
            $error = '<p style="color: red;" align=center>帳號不存在</p>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="copyright" content="MACode ID, https://macodeid.com/">
  <title>輔仁大學 專題評分管理系統</title>
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/maicons.css">
  <link rel="stylesheet" href="assets/vendor/animate/animate.css">
  <link rel="stylesheet" href="assets/vendor/owl-carousel/css/owl.carousel.css">
  <link rel="stylesheet" href="assets/vendor/fancybox/css/jquery.fancybox.css">
  <link rel="stylesheet" href="assets/css/theme.css">
    <style>
    #login{
        background: #ffffff;
        width: 50%;
        height: auto;
        padding: 30px;
        border-radius: 24px;
        margin: auto;
        display: flex;
        align-items: center;
        margin-top: 50px;
    }
    @media (max-width:768px) {
        #login{
            margin: auto;
            flex-direction: column;
        }
        img{
            margin-bottom: 12px;
            display: block;
            margin: 0 auto;
        }
    }
    @media (min-width:768px) {
        img{
            margin-right: 12px;
        }
    }
    body{
        background: #52525b;
        width: 100%;
        height: 100%;
        display: flex;
    }
    </style>
</head>

<body>
    <div id="login">
        <div style="width: 40%;">
            <img src="img/logo.png" width="100%" style="padding:32px;">
        </div>
        
        <div style="width: 60%;">
            <div align="center">
                <p>
                    <font color="#4f5d50" style="font-size:28px;"><b>專題評分管理系統</b></font><br>
                    <font color="#4f5d50" style="font-size:24px;">登入<br></font>
                </p>
            </div>
            <div align="center">
                <form method="post">
                    <p><input type="text"  class="form-control" name="acc" placeholder="帳號" required></p>
                    <p><input type="password" class="form-control" name="pas" placeholder="密碼" required></p>
                    <? echo $error; ?>
                    <button type="submit" class="btn btn-primary btn-sm">登入</button>
                    <hr>
                    <a href="https://whoami.fju.edu.tw/"><p style="color:#2f89fc;">忘記密碼?</p></a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
