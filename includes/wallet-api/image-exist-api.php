<?php

require('../../bootstrap.php');

$userPicture     = $_GET['userPicture'];
$userPictureFull = $_GET['userPictureFull'];

$checkImage = '404';

if ($userPicture) {
    $checkImage = image_exist($userPicture);
}

if ($checkImage != '200') {
    if ($userPictureFull != "") {
        if (isset($_GET['type'])) {
            $userPicture = $userPictureFull;
        } else {
            $userPicture = $system['system_uploads'] . '/' . $userPictureFull;
        }
    } else {
        $userPicture = $system['system_url'] . '/content/themes/' . $system['theme'] . '/images/user_defoult_img.jpg';
    }
}

$extArr = explode('.', $userPicture);
$ext    = end($extArr);
$ext    = strtolower($ext);

switch ($ext) {
    case "gif": $ctype="image/gif"; break;
    case "png": $ctype="image/png"; break;
    case "jpeg":
    case "jpg": $ctype="image/jpeg"; break;
    case "svg": $ctype="image/svg+xml"; break;
}

header('Content-type: ' . $ctype);

echo file_get_contents($userPicture);