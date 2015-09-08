import redis
import time
import random

r = redis.StrictRedis(host='localhost', port=6379, db=0)
r.set('foo', 'bar')
print(r.get('foo'))

start = time.time()
random.seed()

for i in range(0, 10000):
    r.set(i, random.random())

print(time.time() - start)
