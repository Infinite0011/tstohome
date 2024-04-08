<?php if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	
	
	if (isset($_SESSION['status']) && $_SESSION['status'] == "loggedin"){
        include "currentuser.php";
        if(strtotime(date('Y-m-d', strtotime($_SESSION['subscriptionDate'])))<strtotime(date('Y-m-d'))){
            echo "Please subscribe to download this file";
            exit;
            
        }
    
    
    
    
}
         else{
            
            echo "Please subscribe to download this file";
            exit;
        }

$dir="apk/";
$filename=$_GET['file'];
if($filename=='32bit'){
   $filename='32bit.apk'; 
    
}
elseif($filename=='64bit'){$filename='64bit.apk';}
elseif($filename=='128bit'){$filename='128bit.apk';}
elseif($filename=='normalgame'){$filename='normalgame.apk';}
elseif($filename=='root'){$filename='root.zip';}
elseif($filename=='bluestacksinstaller'){$filename='bluestacksinstaller.exe';}
elseif($filename=='noxplayer'){$filename='noxplayer.exe';}

//$filename = $_GET['path'];
$file_path=$dir.$filename;
$ctype="application/octet-stream";
 //
if(!empty($file_path) && file_exists($file_path)){ //check keberadaan file
header("Pragma:public");
header("Expired:0");
header("Cache-Control:must-revalidate");
header("Content-Control:public");
header("Content-Description: File Transfer");
header("Content-Type: $ctype");
header("Content-Disposition:attachment; filename=\"".basename($file_path)."\"");
header("Content-Transfer-Encoding:binary");
header("Content-Length:".filesize($file_path));
flush();
readfile($file_path);
exit();
}
else
{
echo "The File does not exist.";
}

?>