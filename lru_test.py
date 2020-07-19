import functools
import random

@functools.lru_cache(128)
def to_string(integer):
    return str(integer)

print('Iterating 1000 times')
print('Cache size is 128')

print('For integers between 1 and 10')
for i in range(1000):
    _ = to_string(random.randint(0, 10))

print(to_string.cache_info())
to_string.cache_clear()

print('For integers between 1 and 100')
for i in range(1000):
    _ = to_string(random.randint(0, 100))

print(to_string.cache_info())
to_string.cache_clear()

print('For integers between 1 and 1000')
for i in range(1000):
    _ = to_string(random.randint(0, 1000))
print(to_string.cache_info())
to_string.cache_clear()
