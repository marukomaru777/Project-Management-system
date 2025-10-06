<?
    $error="";
    session_start();
    $user_acc = $_SESSION['account'];
    $user_name = $_SESSION['name'];
    session_start();
    if($_SESSION['identity'] <> "student")
    {
        header('Location: logout.php?message=請登入');
    }
?>
<div>
    <form method="post" action="group_dblink.php">
    <input type=hidden name="method" value="<? echo $_GET['method']; ?>">
        <div class="container-fluid d-flex align-items-center">
            <div class="col"></div>
            <div class="col d-flex justify-content-center align-items-center"><p align=center style="font-size: 28px;">
                <b>新增專題組</b>
            </div>
            <div class="col d-flex" style="justify-content: flex-end;" align=right>
            </div>
        </div>
    <input type=hidden name="user_acc" value="<? echo $user_acc; ?>">
    <table width=80% class="table table-hover table-responsive">
        <thead align="center">
            <th width="45%"></th>
            <th width="55%"></th>
        </thead>
        <tbody>
        <tr>
            <td  align=right><b>組長學號：</b></td>
            <td><? echo $user_acc ?></td>
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
            <td  align=right><b>組長姓名：</b></td>
            <td><? echo $user_name ?></td>
        </tr>
        </tbody>
        <tfoot>
            <td colspan=2 align=center>
                <input class="btn btn-sm btn-success" type ="submit" value="確認新增"></input></a>
            </td>
        </tfoot>
    </table>
    </form>
    
</div>

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