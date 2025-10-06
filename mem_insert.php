<?
    session_start();
    if($_SESSION['identity'] <> "student")
    {
        header('Location: logout.php?message=請登入');
    }
    
    $error = "";
    $user_acc = $_SESSION['account'];
    $user_name = $_SESSION['name'];

    $link=mysqli_connect("localhost","root","12345678","project");
    $sql_m="select * from memberlist where st_id = '$user_acc'";
    $rs_m=mysqli_query($link,$sql_m);
    $record=mysqli_fetch_row($rs_m);//取得該筆帳號所在的組別代碼
    $g_id = $record[1]; //所屬小組代碼
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增專題組員</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>
<body>
    <div>
    <form method="post" action="mem_dblink.php">
    <input type=hidden name="method" value="<? echo $_GET['method']; ?>">
    <input type=hidden name="g_id" value="<? echo $g_id; ?>">
        <table class="table table-hover">
            <p align=center style="font-size: 28px;"><b>新增專題成員</b></p>
            <thead>
                <td width=45%></td>
                <td width=55%></td>
            </thead>
            <tbody>
                <tr>
                    <td align=right><b>學號：</b></td>
                    <td><input type="text" name="st_id" placeholder="學號" required></td>
                </tr>
                <tr>
                    <td align=right><b>就讀學院：</b></td>
                    <td><select id="college-list" onchange="changeCollege(this.selectedIndex)"></select></td>
                </tr>
                <tr>
                    <td  align=right><b>就讀科系：</b></td>
                    <td><select name="st_dep" id="dep-list" required></select></td>
                </tr>
                <tr>
                    <td  align=right><b>姓名：</b></td>
                    <td><input type="text" name="st_name" placeholder="姓名" required></td>
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
<script type="text/javascript">
var colleges = ['藝術學院', '文學院', '醫學院', '外國語文學院', '民生學院', 
'傳播學院', '法律學院', '教育學院', '管理學院', '理工學院', '社會科學院', '織品服裝學院'];
var collegeSelect=document.getElementById("college-list");
var inner="";
for(var i=0;i<colleges.length;i++){
    //inner第一行就會像是 <option value=0>商學院</option>
    inner=inner+'<option value=i>'+colleges[i]+'</option>';
}
collegeSelect.innerHTML=inner;

var st_dep=new Array();
st_dep[0]=["音樂學系", "應用美術學系", "景觀設計學系"];
st_dep[1]=["中國文學系", "歷史學系", "哲學系"];
st_dep[2]=["護理學系", "公共衛生學系", "醫學系", "臨床心理學系", "職能治療學系", "呼吸治療學系"];
st_dep[3]=["英國語文學系", "法國語文學系", "西班牙語文學系", "日本語文學系" , "義大利語文學系" , "德語語文學系"];
st_dep[4]=["餐旅管理學系", "兒童與家庭學系", "食品科學系", "營養科學系"];
st_dep[5]=["影像傳播學系", "新聞傳播學系", "廣告傳播學系"];
st_dep[6]=["法律學系", "財經法律學系", "學士後法律學系"];
st_dep[7]=["圖書資訊學系", "體育學系體育學組" , "體育學系運動競技組", "體育學系運動健康管理組"];
st_dep[8]=["企業管理學系", "金融與國際企業學系", "會計學系", "資訊管理學系", "統計資訊學系"];
st_dep[9]=["數學系純數學組", "數學系應用數學組", "化學系", "資訊工程學系", "生命科學系", "物理學系物理組", "物理學系光電物理組", "電機工程學系"];
st_dep[10]=["心理學系", "社會學系", "社會工作學系", "經濟學系", "宗教學系"];
st_dep[11]=["織品服裝學系織品設計組", "織品服裝學系織品服飾行銷組", "織品服裝學系服飾設計組"];
function changeCollege(index){
	var Sinner="";
		for(var i=0;i<st_dep[index].length;i++){
			Sinner=Sinner+'<option value='+st_dep[index][i]+'>'+st_dep[index][i]+'</option>';
		}
	var DepSelect=document.getElementById("dep-list");
		DepSelect.innerHTML=Sinner;
}
changeCollege(document.getElementById("college-list").selectedIndex);
</script>