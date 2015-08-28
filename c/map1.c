#include <stdio.h>
#include <time.h>
#include <stdlib.h>

#define N 1000000

typedef struct object {
    int x;
    int y;
} object;

object obj[N];

int step(object *obj)
{
    obj->x += rand() % 20 - 10;
    obj->y += rand() % 20 - 10;
    obj->x += 1;
    obj->y += 1;
    
//    int i, x = 0;
//    for (i = 0 ; i < 100 ; i++) {
//        if (obj->x == obj[i].x && obj->y == obj[i].y) {
//            x++;
//        }
//    }
//    return x;
}

void main()
{
    clock_t begin, end;
    double time_spent;
    int i, j;
    for (i = 0 ; i < N ; i++) {
        obj[i].x = 0;
        obj[j].y = 0;
    }

    srand(time(NULL));

    begin = clock();
    for (i = 0 ; i < 10 ; i++) {
        for (j = 0 ; j < N ; j++) {
            step(&obj[j]);
        }
    }
    end = clock();
    time_spent = (double)(end - begin) / CLOCKS_PER_SEC;

    printf("%lf\n", time_spent);
}
