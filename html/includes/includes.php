<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);

$mtime = microtime();
$mtime = explode(" ",$mtime);
$mtime = $mtime[1] + $mtime[0];
$starttime = $mtime;

include $root.'/includes/config.php';