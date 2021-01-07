<?php

require_once('functions.php');


/**
 * Function to generate thubnails of videos
 * @params required ($s3VideoLink, $timeInterval)
 */
class helpers
{

  /*
  *function to umake videothumb thubnails
  *@env(local(for localhost)/prod(for stage or live))
  */

  function makeVideosThumbnails($s3VideoLink, $timeInterval, $env)
  {

    //$cdnLink = ($env == 'stage') ? 'https://cdn.stratus-stage.xyz/uploads/' : 'https://cdn1.stratus.co/uploads/';

    $videoLink = $s3VideoLink;


    $folder = SYS_URL . '/photos/';
    // $output_dir = $folder . '/' . date('Y') . '/' . date('m') . '/';
    //FFmpeg package path
    $ffmpeg = '/usr/bin/ffmpeg';
    //Video link from s3
    $video = $videoLink;

    $name_info = pathinfo($video);
    //where to save the image
    //  $image = $folder.$name_info['filename'].'.jpg';
    $file_name = $name_info['filename'] . '.jpg';


    $path = ABSPATH . $system['uploads_directory'] . 'content/uploads/photos/' . $file_name;

    //print_r($path); die;

    //time to take screenshot at
    $interval = $timeInterval;
    //screenshot size
    $size = '640x480';
    //ffmpeg command
    $cmd = "$ffmpeg  -i $video -vf scale=-2:ih -deinterlace -an -ss $interval -f mjpeg -t 1 -r 1 -y -s $size $path 2>&1";

    exec($cmd, $output);

    if ($env == 'local') :
      $thumb_ = 'photos/' . $file_name;
    else :
      $thumb_ = $file_name;

    endif;
    return array("status" => true, "thumb" => $thumb_, "img_path" => $path, "filename" => $file_name);

    //print_r($output); die;

  }



  function local_aws_s3_upload($file_source, $file_name)
  {
    global $system;
    require_once(ABSPATH . 'includes/libs/AWS/aws-autoloader.php');
    $s3Client = Aws\S3\S3Client::factory(array(
      'version'    => 'latest',
      'region'      => $system['s3_region'],
      'credentials' => array(
        'key'    => $system['s3_key'],
        'secret' => $system['s3_secret'],
      )
    ));
    $Key = 'uploads/' . $file_name;
    $result = $s3Client->putObject([
      'Bucket' => $system['s3_bucket'],
      'Key'    => $Key,
      'Body'   => 'This is the body',
      'ACL'    => 'public-read',
      'SourceFile' => $file_source
    ]);

    //var_dump($result);
    /* remove local file */
    gc_collect_cycles();
    if ($s3Client->doesObjectExist($system['s3_bucket'], $Key)) {
      unlink($file_source);
    }
  }
} // End of helpers class
