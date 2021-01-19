<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/**
 * index
 *
 * @package Sngine
 * @author Zamblek
 */

// fetch bootloader
require('bootloader.php');

try {
    global $system;
    require_once("vendor/autoload.php");
    \Tinify\setKey("hh9jTWDVlvV24rdbHvPvcKT5lF0tBpHd");
    require_once(ABSPATH . 'includes/libs/AWS/aws-autoloader.php');
    $s3Client = Aws\S3\S3Client::factory(array(
        'version' => 'latest',
        'region' => $system['s3_region'],
        'credentials' => array(
            'key' => $system['s3_key'],
            'secret' => $system['s3_secret'],
        )
    ));
    $curent_month = date('m');
    $curent_year = date('Y');
    $iterator = $s3Client->getIterator('ListObjects', array(
        'Bucket' => "prod-stratus",
        'Prefix' => 'uploads/photos/' . $curent_year . '/' . $curent_month
    ));
    foreach ($iterator as $bucket) {
        // Each Bucket value will contain a Name and CreationDate
        $newstring = substr($bucket['Key'], -3);

        if ($bucket['Size'] > 900000 && $newstring != "gif") {
            $url = $system['system_uploads_assets'] . $bucket['Key'];
            echo $url;
            echo "<br>" . formatSizeUnits($bucket['Size']);
            $source = \Tinify\fromUrl($url);
            $source->store(array(
                "service" => "s3",
                "aws_access_key_id" => "AKIATYH6KLWUWLZOGNNT",
                "aws_secret_access_key" => "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",
                "region" => "us-east-2",
                "headers" => array("Cache-Control" => "max-age=31536000", 'Expires' => gmdate('D, d M Y H:i:s T', strtotime('+3 years'))),
                "path" => "prod-stratus/" . $bucket['Key']
            ));
            echo "<br>DONE<br><br>";
        }
    }
    die;
} catch (Exception $e) {
    _error(__("Error"), $e->getMessage());
}
