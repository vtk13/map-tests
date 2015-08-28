<?php
define('N', 1000000);

class Obj
{
    protected $x = 0;
    protected $y = 0;

    public function step()
    {
//	$this->x += rand(-10, 10);
//	$this->y += rand(-10, 10);
	$this->x += 1;
	$this->y += 1;
    }
}

$obj = [];

for ($i = 0 ; $i < N ; $i++) {
    $obj[$i] = new Obj();
}

$start = microtime(true);

for ($i = 0 ; $i < 10 ; $i++) {
    for ($j = 0 ; $j < N ; $j++) {
        $obj[$j]->step();
    }
}

var_dump(microtime(true) - $start);