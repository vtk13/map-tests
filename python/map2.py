import time

before = time.time()
myMap = list([[] for i in range(10000)])
for mm in myMap:
    for x in range(10000):
        mm.append(x)
print(time.time() - before)
