<?php
class ImageLibrary
{
    private $images_src;
    private $path = 'images';

    /**
     * This method set $images_src Images Src for ImageLibrary
     * 
     * @param string $feed feed get from Twitter via TW lib.
     */
    function setData($feed)
    {
        $images_src = array();
        if (isset($feed->extended_entities) && is_array($feed->extended_entities->media)) {
            $images = $feed->extended_entities->media;
            foreach ($images as $image) {
                $url = $image->media_url;
                array_push($images_src, $url);
            }
        }
        $this->images_src = $images_src;
    }

    /**
     * This method set a path to the directory that contains image.
     * If you don't call or set $path variable is empty or null, image will be save into __DIR__/images/...
     * 
     * @param string $path path derectory contain image
     */
    function setPath($path = null) {
        if ($path == '' || $path === null) {
            $this->path = 'images';
        } else {
            $this->path = $path;
        }
	}

    /**
     * This method return path derectory save image.
     * 
     * @return string $path path derectory save image
     */
	function getPath() {
		return $this->path;
	}

    /**
     * This method implement download images into server.
     * 
     * @return boolean true when download and save images successfull.
     * @return boolean false when the post haven't image or download false
     */
    function save()
    {
        if (count($this->images_src) === 0) {
            error_log('Feed not image. ' . PHP_EOL, 3, 'log.log');
            return false;
        }

        $path_derectory = __DIR__ . '/' . $this->path;
        if (!file_exists($path_derectory)) {
            if (!mkdir($path_derectory)) {
                error_log('Have some error when create folder ' . $path_derectory . PHP_EOL, 3, 'log.log');
                return false;
            }
            chmod($path_derectory, 0755);
        }

        foreach ($this->images_src as $src) {
            $filename = pathinfo($src)['basename'];
            $path_save_image = $path_derectory . '/' . $filename;
            $content_img = file_get_contents($src);
            if ($content_img) {
                if (file_put_contents($path_save_image, $content_img)) {
                    error_log('Save Image Success. ' . date("Y-m-d H:i:s") . PHP_EOL, 3, 'log.log');
                } else {
                    error_log('Save Image False. ' . date("Y-m-d H:i:s") . PHP_EOL, 3, 'log.log');
                }
            } else {
                error_log('Download image false ' . $filename, 3, 'log.log');
                return false;
            }
        }

        return true;
    }
}
