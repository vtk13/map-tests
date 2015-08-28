N = 1000000;

function Obj()
{
    this.x = 0;
    this.y = 0;
    this.queue = [];
}

Obj.prototype.step = function() {
    if (this.queue.length == 0) {
        this.queue = this.getPath(this.x + 5, this.y + 5);
    }

    var point = this.queue.pop();
    this.x += point.x;
    this.y += point.y;
};

Obj.prototype.getPath = function(y, x) {
    var res = [];
    var tx = this.x;
    var ty = this.y;
    var dx = x > this.x ? 1 : -1;
    var dy = y > this.y ? 1 : -1;

    while (tx != x) {
        tx = tx + dx;
        res.push({
            x: tx,
            y: ty
        });
    }

    while (ty != y) {
        ty = ty + dy;
        res.push({
            x: tx,
            y: ty
        });
    }

    return res.reverse();
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
