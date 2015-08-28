<?php
require_once 'vendor/autoload.php';

$db = new \Vtk13\LibSql\Mysql\Mysql('localhost', 'root', '', 'test');

//$db->query('ALTER TABLE map DROP INDEX `xy`');
//$db->query('TRUNCATE map');

$db->query('DROP TABLE IF EXISTS map');
$db->query('CREATE TABLE `map` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `x` int(10) unsigned NOT NULL,
  `y` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `xy` (`x`,`y`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8');

$start = microtime(true);

for ($i = 0 ; $i < 1e6 ; $i++) {
    $db->insert('map', array(
        'x' => rand(0, 1e6),
        'y' => rand(0, 1e6),
    ));
}
/*
for ($i = 0 ; $i < 10000 ; $i++) {
    // one row per request takes 280s per 1M rows (~3500 rows/s)
    // one row per request takes 272s per 1M rows (~3700 rows/s) with index
    // 100 row per request takes 13s per 1M rows (~77000 rows/s) without index
    // 100 row per request takes 26s per 1M rows (~38000 rows/s) with index

    // insert 100 rows per request
    $q = 'INSERT INTO map(x, y) VALUES';
    for ($j = 1 ; $j < 100 ; $j++) {
        $x = rand(0, 1e6);
        $y = rand(0, 1e6);
        $q .= "($x, $y),";
    }
    $x = rand(0, 1e6);
    $y = rand(0, 1e6);
    $q .= "($x, $y)";
    $db->query($q);
}
*/

var_dump(microtime(true) - $start);

//$db->query('ALTER TABLE map ADD INDEX `xy` (`x`, `y`)');
