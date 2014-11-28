<?php
header("Content-Type: image/png");

include('qrlib/qrlib.php');

$text = $_GET['data'];
$outfile = false;
$level = QR_ECLEVEL_H;
$size = $_GET['size'] == 'small' ? 1 : 20; 
$margin = 4;
$saveandprint=false;

// SVG file format support 
$svgCode = QRcode::png($text, $outfile, $level, $size, $margin, $saveandprint);

echo $svgCode;
