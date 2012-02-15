<?php

require_once '../simplebox/simplebox.php';

$sb = new SimpleBox();
$sb->loadSimpleBox();
print_r($sb->get('dev.backend'));

$sb->debug(array('method'=>'console'));
?>
