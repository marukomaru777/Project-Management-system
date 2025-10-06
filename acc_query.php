<?
    session_start();
    if($_SESSION['identity'] <> "dba")
    {
        header('Location: logout.php?message=請登入');
    }

    $searchid = $_GET["searchid"];
    //$searchtxt = $_GET["searchtxt"];

    if(isset($_GET["message"]))
    {
        $message = $_GET["message"];
        echo "<script>alert('$message');top.location='acc_index.php?method=query';</script>";
    }
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="Generator" content="EditPlus®">
<meta name="Author" content="">
<meta name="Keywords" content="">
<meta name="Description" content="">
<title>帳號管理系統</title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" class="init">
    $(document).ready(function() {
        $('#account').DataTable( {
            order: [[ 3, 'desc' ], [ 0, 'asc' ]]
        } );
    } );
</script>
</head>
<body>
    <form action="acc_index.php" method="get">
	    <input type=hidden name="method" value="query">
        <div class="container-fluid d-flex align-items-center">
            <div class="col d-flex justify-content-start lign-items-center">
            <a href="acc_index.php?method=insert"><input class="btn btn-sm btn-danger" type ="button" value="新增帳號"></input></a>
            </div>
            <div class="col d-flex justify-content-center lign-items-center"><p align=center style="font-size: 28px;">
                <b>帳號管理</b>
            </div>
            <div class="col d-flex" style="justify-content: flex-end;"  align=right>
                <select name="searchid">
                    <option value="">請選擇</option>
                    <option value="student">學生</option>
                    <option value="teacher">老師</option>
                    <option value="dba">管理者</option>
                </select>
                <input class="btn btn-sm btn-light me-md-2" type=submit value="搜尋">
            </div>
        </div>
	</form>
    
    <table class="table table-hover display" id="account" width="100%">
        <thead align=center>
            <th width>帳號</th>
            <th>密碼</th>
            <th>姓名</th>
            <th>權限</th>
            <th width=20%>編輯</th>
        </thead>
        <tbody align=center>
            <?
            $link=mysqli_connect("localhost","root","12345678","project");
            if(empty($searchid)){
                $sql="select * from accountlist";
            }
            elseif($searchid == "student") //學生帳號
            {
                $sql="select * from accountlist where identity = 'student'";
            }
            elseif($searchid == "teacher")//老師帳號
            {
                $sql="select * from accountlist where identity = 'teacher'";
            }
            elseif($searchid == "dba")//管理者帳號
            {
                $sql="select * from accountlist where identity = 'dba'";
            }

            $rs=mysqli_query($link,$sql);

            while($record=mysqli_fetch_row($rs))
            {
                echo "<tr><td>$record[0]</td><td>$record[1]</td><td>$record[2]</td>";
                if($record[3] == "student"){
                    echo "<td>學生</td>";
                }elseif($record[3] == "teacher"){
                    echo "<td>老師</td>";
                }elseif($record[3] == "dba"){
                    echo "<td>管理者</td>";
                }
                echo '<td><a href=acc_index.php?method=update&account='.$record[0].'><input type ="button" value="修改"></a>
                <a href=acc_index.php?method=delete&account='.$record[0].'><input type ="button" onclick="myFunction()" value="刪除"></a></td></tr>';
            }
            mysqli_close($link);
            ?>
        </tbody>
        <tfoot>
            <td colspan="5" align=center>
            </td>
        </tfoot>
    </table>
</body>
</html>
