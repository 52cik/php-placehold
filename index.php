<?php
/**
 * @author 楼教主
 * @date 2016-10-12
 * @note php >= 5.4
 */

$uri = $_SERVER['REQUEST_URI'];

if ($uri === '/') {
  index();
}

$params = explode('?', $uri);
$params = $params[0];

$re = '/^\/(\d+)(?:x(\d+)|)(?:\/([\da-f]{3}|[\da-f]{6})|)(?:\/([\da-f]{3}|[\da-f]{6})|)(?:\.(jpg|png|gif)|)$/i';
if (preg_match($re, $params, $m)) {
  $width = +getval($m, 1, 100);

  $format = [
    'width' => $width,
    'height' => +getval($m, 2, $width),
    'bg_color' => getval($m, 3, 'aaa'),
    'color' => getval($m, 4, 'fff'),
    'type' => getval($m, 5, 'png'),
  ];

  if (isset($_GET['text'])) {
    $format['text'] = $_GET['text'];
  } else {
    $format['text'] = $format['width'] . 'x' . $format['height'];
  }

  draw($format);
} else {
  err();
}

/**
 * draw image
 * @param  Array $format
 */
function draw($format) {
  extract($format);

  $mime_type = [
    'png' => 'image/jpeg',
    'jpg' => 'image/jpeg',
    'gif' => 'image/gif',
  ];

  $image_type = [
    'png' => 'imagepng',
    'jpg' => 'imagejpeg',
    'gif' => 'imagegif',
  ];

  // Create image
  $image = imagecreatetruecolor($width, $height);

  // Colours
  list($R, $G, $B) = hex2rgb($bg_color);
  $bg_color = imagecolorallocate($image, $R, $G, $B);

  list($R, $G, $B) = hex2rgb($color);
  $color = imagecolorallocate($image, $R, $G, $B);

  // Fill background color
  imagefill($image, 0, 0, $bg_color);

  // Text positioning
  $fontsize = 26;
  $font = __DIR__ . '/lihei pro.ttf';

  $textBox = imagettfbbox($fontsize, 0, $font, $text);

  while (((($width - ($textBox[2] - $textBox[0])) < 10) || (($height - ($textBox[1] - $textBox[7])) < 10)) && ($fontsize > 1)) {
    $fontsize--;
    $textBox = imagettfbbox($fontsize, 0, $font, $text);
  }

  // Generate text
  imagettftext($image, $fontsize, 0, ($width / 2) - (($textBox[2] - $textBox[0]) / 2), ($height / 2) + (($textBox[1] - $textBox[7]) / 2), $color, $font, $text);

  // Set cache
  header('Content-type:' . $mime_type[$type]);
  header('Expires: ' . gmdate('D, d M Y H:i:s \G\M\T', time() + 604800));
  header('Cache-Control: public');

  // Render image
  $drawimage = $image_type[$type];
  $drawimage($image);

  // cleanup
  imagecolordeallocate($image, $color);
  imagecolordeallocate($image, $bg_color);
  imagedestroy($image);

  exit;
}

function index() {
  include 'doc.php';
  exit;
}

function err() {
  header('HTTP/1.1 404 Not Found');
  header('Status: 404 Not Found');
  exit('404 Not Found');
}

function hex2rgb($hex) {
  if (strlen($hex) === 3) {
    return [hexdec($hex[0] . $hex[0]), hexdec($hex[1] . $hex[1]), hexdec($hex[2] . $hex[2])];
  }

  return [hexdec($hex[0] . $hex[1]), hexdec($hex[2] . $hex[3]), hexdec($hex[4] . $hex[5])];
}

function getval($arr, $idx, $def_val) {
  return isset($arr[$idx]) && $arr[$idx] ? $arr[$idx] : $def_val;
}
