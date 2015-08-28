N = 1000000;

function Obj()
{
    this.x = 0;
    this.y = 0;
    this.queue = [];
}

Obj.prototype.step = function() {
    if (this.queue.length == 0) {
        this.queue = this.getPath();
    }

    var point = this.queue.pop();
    this.x += point.x;
    this.y += point.y;
};

Obj.prototype.getPath = function() {
    return [
        {x: 20, y: 100},
        {x: 20, y: 100},
        {x: 20, y: 100},
        {x: 20, y: 100},
        {x: 20, y: 100},
        {x: 20, y: 100},
        {x: 20, y: 100},
        {x: 20, y: 100},
        {x: 20, y: 100},
        {x: 20, y: 100},
        {x: 20, y: 100},
        {x: 20, y: 100}
    ];
};

var obj = new Array(N);
var i, j;

for (i = 0 ; i < N ; i++) {
    obj[i] = new Obj();
}

console.time("test");

for (i = 0 ; i < 10 ; i++) {
    for (j = 0 ; j < N ; j++) {
        obj[j].step();
    }
}

console.timeEnd("test");
