
function Map(width, height)
{
    this.map = [];
    for (var x = 0 ; x < width ; x++) {
        this.map[x] = [];
        for (var y = 0 ; y < height ; y++) {
            this.map[x][y] = 0;
        }
    }
}

Map.prototype.getPath = function(fx, fy, tx, ty)
{

};

Map.prototype.putSiblingsIntoQueue = function()
{

}

console.log('Creating map');
var map = new Map(10000, 10000);
console.log('Benchmark');

