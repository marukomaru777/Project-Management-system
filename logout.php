<?
    if(isset($_GET["message"])){
        $message = $_GET["message"];
        header("Location:login.php?message=$message");
    }
    session_start();
    session_destroy();
    header("Location:login.php");
?>