<?php

require_once '../querybox/querybox.php';

$qb = new QueryBox();
$qb->loadQueryBox();
echo '<pre>';
print_r($qb->get('table.content.name'));
//#__content
echo PHP_EOL;

print_r($qb->get('table.content.fields'));

//Array
//(
//    [0] => id
//    [1] => title
//)

$qb->debug(array('method'=>'console'));
?>
