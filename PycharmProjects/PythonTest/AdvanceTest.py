# 切片

L = ['apple', 'banner', 'orange', 'pear']

print(L[1:3])
print(L[-2])
print(L[-2:])
print(L[-3:-1])

R = list(range(4, 10))

print(R)

S = 'ni gan sha lei'

print(S[-3:-1])

# 迭代

dict = {'name': 'xiaochuan', 'job': 'PHP', 'level': '5 year'}

for key, value in dict.items():
    print(key, value)

from collections import Iterable

print(isinstance('abc', Iterable))
print(isinstance([1, 2, 3], Iterable))
print(isinstance(123, Iterable))

list = ['A', 'B', 'C']
for i, value in enumerate(list):
    print(i, value)

new0 = [x * x for x in range(1, 10) if x % 2 == 0]
new1 = [m + '*' + n for m in 'ABC' for n in 'XYZ']

print(new0, new1)

import os

mulu = [d for d in os.listdir('.')]

print(mulu)

print([k + '=' + v for k, v in {'key1': 'value1', 'key2': 'value2'}.items()])

# 生成器 generator

g = (x * x for x in range(1, 10))

for n in g:
    print(n)


def fib(max):  # 斐波那契数列
    n, a, b = 0, 0, 1
    while n < max:
        yield (b)
        a, b = b, a + b
        n = n + 1
    return 'done'


g = fib(6)
while True:
    try:
        x = next(g)
        print('g:', x)
    except StopIteration as e:
        print('Generator return value:', e.value)
        break

import math


def triangles(max):  # 杨辉三角 太6了 要优化呀 怎么搞的呢
    L = [1]
    while len(L) <= max:
        yield L
        L = [1] + [L[j + 1] + L[j] for j in range(len(L)) if j < len(L) - 1] + [1]
    return 'done'

g = triangles(10)
while True:
    try:
        y = next(g)
        print('triangle:', y)
    except StopIteration as e:
        print('Generator return value:', e.value)
        break
from collections import Iterator

print(isinstance([], Iterator))
print(isinstance(iter('abc'), Iterator))