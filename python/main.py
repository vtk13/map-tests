import time
import random

class Unit(object):
    def __init__(self, x, y):
        self.x = x
        self.y = y
        self.coords = []

    def move(self):
        if len(self.coords) == 0:
            self.coords = self.getPath()

        self.x, self.y = self.coords[0]
        self.coords = self.coords[1:]

    def getPath(self):
        return [(0, 1), (1, 1), (1, 2), (2, 2), (2, 3), (3, 3), (3, 4), (4, 4), (4, 5), (5, 5)]

unit = Unit(0, 0)
before = time.time()
for i in range(1000000):
    for j in range(10):
        unit.move()
print(time.time() - before)
