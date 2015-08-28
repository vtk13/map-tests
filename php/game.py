import random
import time

class Unit:
    def __init__(self, x, y):
        self.x = x
        self.y = y

    def move(self):
        self.x += 1
        self.y += 1

x = (i for i in range(1000000))
x = tuple(x)
y = (1, 2, 3, 4, 5, 6, 7, 8, 9, 10)
unit = Unit(0, 0)
before = time.time()
for i in x:
    for j in y:
        unit.move()
print(time.time() - before)

