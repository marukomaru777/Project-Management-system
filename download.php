<?
    if(isset($_GET['filename'])){
        
        $folder = $_GET['folder']; //檔案所在資料夾
        $filename=$_GET['filename'];//取出檔案名稱
        $filepath='http://localhost/2021/hw_end/'.$folder.'/'.$filename;//檔案路徑
        header("Content-type: ".filetype("$file"));//指定類型
        header("Content-Disposition: attachment; filename=".$filename."");//指定下載時的檔名
        readfile($filepath);//輸出下載的內容。
    }
?>