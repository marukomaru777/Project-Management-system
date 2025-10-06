<?
    session_start();
    if($_SESSION['identity'] <> "dba")
    {
        header('Location: logout.php?message=請登入');
    }
    $account = $_GET['account'];
    
    $link=mysqli_connect("localhost","root","12345678","project");
    $sql="select * from accountlist where account = '$account'";
    $rs=mysqli_query($link,$sql);
    $record=mysqli_fetch_row($rs);//取得該筆帳號所在的組別代碼
    $account = $record[0];
    $password = $record[1];
    $name = $record[2];
    $identity = $record[3];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改帳號</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>
<body>
    <div>
    <form action="acc_dblink.php" method="post">
    <input type=hidden name="method" value="<? echo $_GET['method'];; ?>">
        <table class="table table-hover">
            <p align=center style="font-size: 20px;"><b>新增帳號</b></p>
            <thead>
                <th width=50%></th>
                <th width=50%></th>
            </thead>
            <tbody>
                <tr>
                    <td align=right><b>帳號：</b></td>
                    <td><input type="text" name="account" value="<? echo $account; ?>" readonly  required></td>
                </tr>
                <tr>
                    <td align=right><b>密碼：</b></td>
                    <td><input type="text" name="password" value="<? echo $password; ?>" required></td>
                </tr>
                <tr>
                    <td align=right><b>姓名：</b></td>
                    <td><input type="text" name="name" value="<? echo $name; ?>" required></td>
                </tr>
                <tr>
                    <td align=right><b>身分：</b></td>
                    <td>
                        <select name="identity" required>
                            <option value="<? echo $identity; ?>">
                            <?
                                if($identity == "student"){echo "學生";}
                                if($identity == "teacher"){echo "老師";}
                                if($identity == "dba"){echo "管理者";}
                            ?>
                            </option>
                            <option value="student">學生</option>
                            <option value="teacher">老師</option>
                            <option value="dba">管理者</option>
                        </select>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <td colspan=2 align=center>
                    <input class="btn btn-sm btn-secondary" type ="button" onclick="history.back()" value="取消"></input>&ensp;
                    <input class="btn btn-sm btn-success" type ="submit" value="確認修改"></input></a>
                </td>
            </tfoot>
        </table>
    </form>
</div>
</body>
</html>