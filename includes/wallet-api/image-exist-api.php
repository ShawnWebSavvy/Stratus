<?php
require('../../bootstrap.php');

if (strpos($_SERVER['HTTP_REFERER'], $_SERVER['SERVER_NAME']) === false) die;

function resize($targetFile, $originalFile) {

    $info = getimagesize($originalFile);
    $mime = $info['mime'];

    switch ($mime) {
            case 'image/jpeg':
                    $image_create_func = 'imagecreatefromjpeg';
                    $image_save_func = 'imagejpeg';
                    $new_image_ext = 'jpg';
                    break;

            case 'image/png':
                    $image_create_func = 'imagecreatefrompng';
                    $image_save_func = 'imagepng';
                    $new_image_ext = 'png';
                    break;

            case 'image/gif':
                    $image_create_func = 'imagecreatefromgif';
                    $image_save_func = 'imagegif';
                    $new_image_ext = 'gif';
                    break;

            default: 
                    throw new Exception('Unknown image type.');
    }

    $img = $image_create_func($originalFile);
    list($width, $height) = getimagesize($originalFile);

    if ($width > 150) {
        $newWidth = 150;
        $newHeight = ($height / $width) * $newWidth;
    } else {
        //$newHeight = ($height / $width) * $newWidth;
        $newHeight = $height/2;
        $newWidth  = $width/2;
    }
    $tmp = imagecreatetruecolor($newWidth, $newHeight);
    imagecopyresampled($tmp, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

    if (file_exists($targetFile)) {
            unlink($targetFile);
    }
    $image_save_func($tmp, "$targetFile.$new_image_ext");
}

$userPicture     = $_GET['userPicture'];
$userPictureFull = $_GET['userPictureFull'];

if ($userPictureFull == "https://cdn1.stratus.co/uploads/") {
    $userPicture = $system['system_uploads_assets'] . '/content/themes/default/images/user_defoult_img.jpg';
}

$pathInfo  = pathinfo($userPicture);
$ext       = strtolower($pathInfo['extension']);
$imagePath = str_replace(['http://cdn1.stratus.co/', 'https://cdn1.stratus.co/'], 'content/', $pathInfo['dirname']);
$dir       = __DIR__;
$imagePath = $dir.'/../../'.$imagePath;

if (!file_exists($imagePath)) {
    mkdir($imagePath, 0777, true);
}
$data = @file_get_contents($imagePath.'/'.$pathInfo['basename']);

if (!$data) {
    $data = @file_get_contents($userPicture);

    if ($data) {
        //file_put_contents($imagePath.'/'.$pathInfo['basename'], $data);
        resize($imagePath.'/'.$pathInfo['filename'], $userPicture);
    }
}

if (!$data) {
    if ($userPictureFull != "") {
        if (isset($_GET['type'])) {
            $userPicture = $userPictureFull;
            $data = file_get_contents($userPicture);
        } else {
            $userPicture = $userPictureFull;
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
