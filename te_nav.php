<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="http://code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script> <!--加入最小化版本的JS-->
<style>
    #btn-primary {
        color:#52525b;
        background-color: #dcdde1;
        border-color:#dcdde1;
    }
    #btn-primary:hover,
    #btn-primary:active:hover, #btn-primary.active:hover{
        color:#ffffff;
        background-color: #3f564c;
        border-color: #3f564c;
    }
</style>
<script>
    function paddedFormat(num) {
        return num < 10 ? "0" + num : num; 
    }

    function startCountDown(duration, element) {
        let secondsRemaining = duration;
        let min = 0;
        let sec = 0;
        let countInterval = setInterval(function () {
            min = parseInt(secondsRemaining / 60);
            sec = parseInt(secondsRemaining % 60);
            element.textContent = `${paddedFormat(min)}:${paddedFormat(sec)}`;
            secondsRemaining = secondsRemaining - 1;
            if (secondsRemaining < 0) { clearInterval(countInterval) };
        }, 1000);
    }
    window.onload = function () {
        let time_minutes = 24; // Value in minutes
        let time_seconds = 00; // Value in seconds
        let duration = time_minutes * 60 + time_seconds;
        element = document.querySelector('#count-down-timer');
        element.textContent = `${paddedFormat(time_minutes)}:${paddedFormat(time_seconds)}`;
        startCountDown(--duration, element);
    };
</script>
<?
    session_start();
    if($_SESSION['account']=="")
    {
        header("Location:logout.php");
    }
?>
<nav id="nav" class="navbar navbar-expand-sm navbar-default" style="justify-content: space-between; margin-left: 15%; margin-right: 15%;height: 80px;">
    <ul class="navbar-nav">
        <li style="display: flex; align-items: center;"><img src="img/fju2.gif" ></li>
        <div class="container-fluid justify-content-start" style="display: flex; align-items: center;">
            <a href="te_index.php?method=query"><button class="btn btn-sm btn-outline-success" type="button">專題評分</button></a>
        </div>
    </ul>
        
        <ul class="navbar-nav">
        <div class="container-fluid justify-content-start">
            <!--<p class="text-center" id="count-down-timer"></p>-->
            您好，<? echo $_SESSION['name']; ?>&emsp;
            <a href="logout.php"><button id="btn-primary" class="btn btn-sm" type="button">登出</button></a>
        </div>
    </ul>
</nav>
