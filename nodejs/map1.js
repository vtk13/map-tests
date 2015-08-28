N = 1000000;

function Obj()
{
    this.x = 0;
    this.y = 0;
}

Obj.prototype.step = function() {
    //this.x += Math.round(Math.random() * 20) - 10;
    //this.y += Math.round(Math.random() * 20) - 10;
    this.x += 1;
    this.y += 1;
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
