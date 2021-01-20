<?php
// ini_set("zlib.output_compression", 1);
//ob_start("ob_gzhandler");
require('../../bootstrap.php');

if (strpos($_SERVER['HTTP_REFERER'], $_SERVER['SERVER_NAME']) === false) die;

$userPicture     = $_GET['userPicture'];
$userPictureFull = $_GET['userPictureFull'];

//$checkImage = '404';

//if ($userPicture) {
//    $checkImage = image_exist($userPicture);
//}
//
//if ($checkImage != '200') {
//    if ($userPictureFull != "") {
//        if (isset($_GET['type'])) {
//            $userPicture = $userPictureFull;
//        } else {
//            $userPicture = $system['system_uploads'] . '/' . $userPictureFull;
//        }
//    } else {
//        $userPicture = $system['system_url'] . '/content/themes/' . $system['theme'] . '/images/user_defoult_img.jpg';
//    }
//}

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
