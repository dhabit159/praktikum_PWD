<?php
session_start();
// membuat md5 dari nilai random
$random_alpha = md5(rand());
// memotong string dari nilai md5 mulai dari karakter ke 0 sampai 6
$captcha_code = substr($random_alpha, 0, 6);
// menyimpan kode captcha pada session
$_SESSION["captcha_code"] = $captcha_code;
$target_layer = imagecreatetruecolor(70, 30);
$captcha_background = imagecolorallocate($target_layer, 255, 160, 119);
imagefill($target_layer, 0, 0, $captcha_background);
$captcha_text_color = imagecolorallocate($target_layer, 0, 0, 0);
imagestring($target_layer, 5, 5, 5, $captcha_code, $captcha_text_color);
header("Content-type: image/jpeg");
imagejpeg($target_layer);
