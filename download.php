<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if (isset($_SESSION['status']) && $_SESSION['status'] == "loggedin") {
    include "include/currentuser.php";
    if (strtotime(date('Y-m-d', strtotime($_SESSION['subscriptionDate']))) < strtotime(date('Y-m-d'))) {
        echo "Please subscribe to download this file";
        exit;
    }
} else {

    echo "Please subscribe to download this file";
    exit;
}

$dir = "apk/";
$filename = $_GET['file'];
if ($filename == '32bit') {
    $filename = '32bit.apk';
} elseif ($filename == '64bit') {
    $filename = '64bit.apk';
} elseif ($filename == '128bit') {
    $filename = '128bit.apk';
} elseif ($filename == 'normalgame') {
    $filename = 'normalgame.apk';
} elseif ($filename == 'root') {
    $filename = 'root.zip';
} elseif ($filename == 'bluestacksinstaller') {
    $filename = 'BlueStacksInstaller_5.21.103.1001_native_5f13a5c464ac01ea94a89964cf5c7591_MzsxNSwwOzUsMTsxNSw0OzE1.exe';
} elseif ($filename == 'noxplayer') {
    $filename = 'nox_setup_v7.0.5.9_full_intl.exe';
}

//$filename = $_GET['path'];
$file_path = $dir . $filename;
$ctype = "application/octet-stream";
//
if (!empty($file_path) && file_exists($file_path)) { //check keberadaan file
    header("Pragma:public");
    header("Expired:0");
    header("Cache-Control:must-revalidate");
    header("Content-Control:public");
    header("Content-Description: File Transfer");
    header("Content-Type: $ctype");
    header("Content-Disposition:attachment; filename=\"" . basename($file_path) . "\"");
    header("Content-Transfer-Encoding:binary");
    header("Content-Length:" . filesize($file_path));
    flush();
    readfile($file_path);
    exit();
} else {
    echo "Files are currently being worked on to update them to the new version. Please be patient and check our Discord server https://discord.gg/9sYXqGfyAC for regular updates. Thank you.";
}
