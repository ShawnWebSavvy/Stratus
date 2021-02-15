<?php
// ini_set("zlib.output_compression", 1);
//ob_start("ob_gzhandler");
require('../../bootstrap.php');

$picture = $_GET['picture'];
$pictureFull = $_GET['picture_full'];
$type = $_GET['type'];

//$checkImage = '404';
global $system;


function set_defoult_img($type){
    global $system;

    switch ($type) {
        case 'male':
            $picture = $system['system_uploads_assets']. '/content/themes/'. $system['theme'] .'/images/user_defoult_img.jpg';
            break;

        case 'female':
            $picture = $system['system_uploads_assets'] . '/content/themes/' . $system['theme'] . '/images/user_defoult_img.jpg';
            break;

        case 'other':
            $picture = $system['system_uploads_assets'] . '/content/themes/' . $system['theme'] . '/images/user_defoult_img.jpg';
            break;

        case 'page':
            $picture = $system['system_uploads_assets'] . '/content/themes/' . $system['theme'] . '/images/svg/svgImg/nav_icon_adHub_active.svg';
            break;

        case 'group':
            $picture = $system['system_uploads_assets'] . '/content/themes/' . $system['theme'] . '/images/svg/svgImg/newgroupIcon1.svg';
            break;

        case 'event':
            $picture = $system['system_uploads_assets'] . '/content/themes/' . $system['theme'] . '/images/svg/svgImg/event_add_icon.svg';
            break;

        case 'article':
            $picture = $system['system_uploads_assets'] . '/content/themes/' . $system['theme'] . '/images//svg/svgImg/blog-defoult-img.jpg';
            break;

        case 'movie':
            $picture = $system['system_uploads_assets'] . '/content/themes/' . $system['theme'] . '/images/blank_movie.jpg';
            break;

        case 'game':
            $picture = $system['system_uploads_assets'] . '/content/themes/' . $system['theme'] . '/images/svg/svgImg/games.svg';
            break;

        case 'package':
            $picture = $system['system_uploads_assets'] . '/content/themes/' . $system['theme'] . '/images/blank_package.png';
            break;

        case 'flag':
            $picture = $system['system_uploads_assets'] . '/content/themes/' . $system['theme'] . '/images/blank_flag.png';
            break;
        default:
            $picture = $system['system_uploads_assets'] . '/content/themes/' . $system['theme'] . '/images/user_defoult_img.jpg';
            break;
    }

    return $picture;

};


if ($picture) {
    $checkImage = image_exist($picture);
}

if ($checkImage != '200'||!$picture) {


    if ($pictureFull != "" || $pictureFull != "https://cdn1.stratus.co/uploads/") {
        if (isset($_GET['type_url'])) {
            $picture = $pictureFull;
        } else {
            $picture = $system['system_uploads'] . '/' . $pictureFull;
        }
    } else {
        $picture = set_defoult_img($type);
    }


    $checkImage = image_exist($picture);

    if ($checkImage != '200') {
        $picture = set_defoult_img($type);
    }

  
}


$data = @file_get_contents($picture);

if (!$data) {
       $picture = set_defoult_img($type);
       
       $data = file_get_contents($picture);
    }


$extArr = explode('.', $picture);
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
