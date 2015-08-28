<?php
require_once 'vendor/autoload.php';

$db = new \Vtk13\LibSql\Mysql\Mysql('localhost', 'root', '', 'test');

$start = microtime(true);
$n = 0;

while (microtime(true) - $start < 10) {
    for ($i = 0 ; $i < 100 ; $i++) {
        $id = rand(1, 1e6);
        $dx = rand(-10, 10);
        $dy = rand(-10, 10);
        $db->query("UPDATE map SET x=x+({$dx}), y=y+({$dy}) WHERE id={$id}");
        $n++;
    }
}

var_dump($n);