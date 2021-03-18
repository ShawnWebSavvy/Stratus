<?php
//ini_set("zlib.output_compression", 1);
ob_start("ob_gzhandler");
require('../../bootstrap.php');

$userPicture     = $_GET['userPicture'];
$userPictureFull = $_GET['userPictureFull'];

//$checkImage = '404';
global $system;
if ($userPicture) {
    $checkImage = image_exist($userPicture);
}

if ($userPictureFull == "https://cdn1.stratus.co/uploads/") {
    $userPictureFull = $system['system_uploads_assets'] . '/content/themes/' . $system['theme'] . '/images/user_defoult_img.jpg';
}

if ($checkImage != '200') {
    if ($userPictureFull != "" || $userPictureFull != "https://cdn1.stratus.co/uploads/") {
        if (isset($_GET['type'])) {
            $userPicture = $userPictureFull;
        } else {
            $userPicture = $userPictureFull;
        }
    } else {
        $userPicture = $system['system_uploads_assets'] . '/content/themes/' . $system['theme'] . '/images/user_defoult_img.jpg';
    }

    $checkImage = image_exist($userPicture);
    if ($checkImage != '200') {
        $userPicture = $system['system_uploads_assets'] . '/content/themes/' . $system['theme'] . '/images/user_defoult_img.jpg';
    }
}

$data = @file_get_contents($userPicture);

if (!$data) {
    if ($userPictureFull != "") {
        if (isset($_GET['type'])) {
            $userPicture = $userPictureFull;
            $data = file_get_contents($userPicture);
        } else {
            $userPicture = $system['system_uploads'] . '/' . $userPictureFull;
            $data = file_get_contents($userPicture);
        }
    } else {
        $userPicture = $system['system_url'] . '/content/themes/' . $system['theme'] . '/images/user_defoult_img.jpg';
        $data = file_get_contents($userPicture);
    }
}
$extArr = explode('.', $userPicture);
$ext    = end($extArr);
$ext    = strtolower($ext);
switch ($ext) {
    case "gif":
        $ctype = "image/gif";
        break;
    case "png":
        $ctype = "image/png";
        break;
    case "jpeg":
    case "jpg":
        $ctype = "image/jpeg";
        break;
    case "svg":
        $ctype = "image/svg+xml";
        break;
}
header('Content-type: ' . $ctype);
echo $data;
