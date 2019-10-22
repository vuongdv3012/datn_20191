<?php
    include_once('ImageLibrary.php');

    $feeds = 'xxxxxxxxx'; //get from Twitter via TW lib;
    $path = '';

    foreach($feeds as $feed) {
        $imageLib = new ImageLibrary();
        $imageLib->setData($feed);
        //Path save images could be flexible. You can set null or empty to path. Or Not call, images will be save into __DIR__./images/...
        $imageLib->setPath();
        $imageLib->save();
    }