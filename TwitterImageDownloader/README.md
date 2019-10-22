# Twitter Image Downloader

Twitter Image Downloader is an PHP library which help you to download image from a account Twitter simplely and easy to use.

## Getting Started

Just include this in your project:
```
include 'ImageLibrary.php';
```
and the script below:
```
$feeds = $your_feed_you_get_from_twitter;

foreach($feeds as $feed){
	$imageLibrary = new ImageLibrary();
	$imageLibrary->setData($feed);
	$imageLibrary->setPath($path);
	$imageLibrary->save();
}
```
### Prerequisites

You have to take feeds from Twitter via Twitter lib.
Then let's play!

### Installing

Follow steps below:

  1. Include ```ImageLibrary.php``` your project.
  2. Include the code in the 'Getting Started' in anywhere you want.

## Features
* Easy to get image.
* Small and Fast.
* Flexible download path.

## Running for test
Custom path save image by call setPath($path) or image will be save default into ./images
Run the ```example.php``` file for more details.

## Built With
* [Twitter API]

## Authors

&lt;code&gt; with ❤ by [Tribal Media House](https://www.tribalmedia.co.jp/)

See also the list of [contributors](#) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details
