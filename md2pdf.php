#!/usr/bin/env php
<?php

use Dompdf\Dompdf;

require 'vendor/autoload.php';

$opts = getopt('i:o:');

if (!empty($opts['i'])) {
    $data = file_get_contents($opts['i']);
} else if (count($argv) >= 2) {
    $data = $argv[1];
} else {
    $data = '';
    $in = fopen('php://stdin', 'r');
    stream_set_blocking($in, false);
    while (($line = fgets($in)) !== false) {
        $data .= $line;
    }
}

if (empty($data)) {
    throw new RuntimeException('You must specify either a file (via -f option) or a Markdown string to the program.');
}

$parsedown = new Parsedown();
$dompdf = new Dompdf();
$dompdf->loadHtml($parsedown->text($data));
$dompdf->render();
file_put_contents(!empty($opts['o']) ? $opts['o'] : 'php://stdout', $dompdf->output());
