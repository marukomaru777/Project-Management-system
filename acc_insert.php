<?
    session_start();
    if($_SESSION['identity'] <> "dba")
    {
        header('Location: logout.php?message=請登入');
    }
    $error = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增帳號</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>
<body>
    <div>
    <form action="acc_dblink.php" method="post">
    <input type=hidden name="method" value="<? echo $_GET['method']; ?>">
        <table class="table table-hover">
            <p align=center style="font-size: 20px;"><b>新增帳號</b></p>
            <thead>
                <th width=50%></th>
                <th width=50%></th>
            </thead>
            <tbody>
                <tr>
                    <td align=right><b>帳號：</b></td>
                    <td><input type="text" name="account" placeholder="帳號" required></td>
                </tr>
                <tr>
                    <td align=right><b>密碼：</b></td>
                    <td><input type="text" name="password" placeholder="密碼" required></td>
                </tr>
                <tr>
                    <td align=right><b>姓名：</b></td>
                    <td><input type="text" name="name" placeholder="姓名" required></td>
                </tr>
                <tr>
                    <td align=right><b>身分：</b></td>
                    <td>
                        <input type="radio" name="identity" value="student" checked>學生
                        <input type="radio" name="identity" value="teacher">老師
                        <input type="radio" name="identity" value="dba">老師
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <td colspan=2 align=center>
                    <p align=center style="color: red;"><? echo $_GET["error"]; ?></P>
                    <input class="btn btn-sm btn-secondary" type ="button" onclick="history.back()" value="取消"></input>&ensp;
                    <input class="btn btn-sm btn-success" type ="submit" value="確認新增"></input></a>
                </td>
            </tfoot>
        </table>
    </form>
</div>
</body>
</html>