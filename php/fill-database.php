<?php
require_once 'vendor/autoload.php';

$db = new \Vtk13\LibSql\Mysql\Mysql('localhost', 'root', '', 'test');

$start = microtime(true);

$db->query('TRUNCATE map');

for ($i = 0 ; $i < 1e6 ; $i++) {
    if (($i % 1e4) == 0) {
        echo "{$i}\n";
    }
    $db->insert('map', array(
        'x' => rand(0, 1e6),
        'y' => rand(0, 1e6),
    ));
}

var_dump(microtime(true) - $start);
