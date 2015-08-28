<?php
require_once 'vendor/autoload.php';

$db = new \Vtk13\LibSql\Mysql\Mysql('localhost', 'root', '', 'test');

$start = microtime(true);
$n = 0;
$ns = [];

while (microtime(true) - $start < 10) {
    for ($i = 0 ; $i < 10 ; $i++) {
        $fx = rand(0, 1e6);
        $fy = rand(0, 1e6);
        $tx = $fx + 10000;
        $ty = $fy + 10000;
        $data = $db->select("SELECT * FROM map WHERE x BETWEEN {$fx} AND {$tx} AND y BETWEEN {$fy} AND {$ty}");
        $ns[] = count($data);
        $n++;
    }
}

var_dump(round(array_sum($ns) / count($ns)));
var_dump($n);