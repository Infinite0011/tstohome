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
if ($_GET['file'] == 'bluestacksinstaller') {
    header("Location: https://cloud.bluestacks.com/api/getdownloadnow?platform=win&win_version=10&mac_version=&client_uuid=000711b7-a9e6-4ee2-bbc9-7b104352592b&app_pkg=&platform_cloud=%257B%2522description%2522%253A%2522Chrome%2520123.0.0.0%2520on%2520Windows%252010%252064-bit%2522%252C%2522layout%2522%253A%2522Blink%2522%252C%2522manufacturer%2522%253Anull%252C%2522name%2522%253A%2522Chrome%2522%252C%2522prerelease%2522%253Anull%252C%2522product%2522%253Anull%252C%2522ua%2522%253A%2522Mozilla%252F5.0%2520(Windows%2520NT%252010.0%253B%2520Win64%253B%2520x64)%2520AppleWebKit%252F537.36%2520(KHTML%252C%2520like%2520Gecko)%2520Chrome%252F123.0.0.0%2520Safari%252F537.36%2522%252C%2522version%2522%253A%2522123.0.0.0%2522%252C%2522os%2522%253A%257B%2522architecture%2522%253A64%252C%2522family%2522%253A%2522Windows%2522%252C%2522version%2522%253A%252210%2522%257D%257D&preferred_lang=en&utm_source=&utm_medium=&gaCookie=&gclid=Cj0KCQjwq86wBhDiARIsAJhuphmvf4yrPGDeBQo8p-PAAL0Uinkd6oNUtxeAeyl4qOaJxNGVjDGXh8YaAob7EALw_wcB&clickid=&msclkid=&affiliateId=&offerId=&transaction_id=&aff_sub=&first_landing_page=&referrer=&download_page_referrer=https%3A%2F%2Fwww.bluestacks.com%2Fbluestacks-5.html%3Futm_source%3DGoogle%26utm_medium%3DCPC%26utm_campaign%3Daw-ded-tier1-eng-bluestacks5-brand%26utm_source%3Dgoogle%26utm_campaign%3D12328978981%26utm_medium%3Dad%26utm_content%3D523252340579%26utm_term%3Dbluestacks%25205%26gad_source%3D1%26gclid%3DCj0KCQjwq86wBhDiARIsAJhuphmvf4yrPGDeBQo8p-PAAL0Uinkd6oNUtxeAeyl4qOaJxNGVjDGXh8YaAob7EALw_wcB&utm_campaign=aw-ded-tier1-eng-bluestacks5-brand&user_id=&exit_utm_campaign=bluestacks5-page-en&incompatible=false&bluestacks_version=bs5&device_memory=8&device_cpu_cores=8");
    exit();
} else if ($_GET['file'] == 'noxplayer') {
    header("Location: https://www.bignox.com/en/download/fullPackage?beta");
    exit();
} else if (!empty($file_path) && file_exists($file_path)) { //check keberadaan file
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
