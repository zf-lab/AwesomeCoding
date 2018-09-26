# 函数式编程

# 高阶函数

# map函数

def square(x):
    return x * x * x


r = map(square, [1, 2, 3])
print(list(r))

# reduce 函数
from functools import reduce


def fn(x, y):
    return x * 10 + y


print(reduce(fn, [1, 2, 3]))

is_str = isinstance(reduce(fn, [1, 2, 3]), int)
print(is_str)

DIGITS = {'0': 0, '1': 1, '2': 2, '3': 3, '4': 4, '5': 5, '6': 6, '7': 7, '8': 8, '9': 9}


def str2int(s):
    def fn(x, y):
        return x * 10 + y

    def char2num(s):
        return DIGITS[s]

    return reduce(fn, map(char2num, s))


def char2num1(s):
    return DIGITS[s]


def str2int1(s):
    return reduce(lambda x, y: x * 10 + y, map(char2num1, s))


print(str2int('6450131'))
print(str2int1('6450131'))


# 求积

def prod(l):
    return reduce(lambda x, y: x * y, l)


print(prod([1, 2, 3]))


# filter

def not_empty(s):
    return s and s.strip()


l = list(filter(not_empty, ['junjun', None, '', 'A', ' ']))
print(l)


# 素数

def _odd_iter():
    n = 1
    while True:
        n = n + 2
        yield n


def _not_divisible(n):
    return lambda x: x % n > 0


def primes():
    yield 2
    it = _odd_iter()
    while True:
        n = next(it)
        yield n
        it = filter(_not_divisible(n), it)


s = ''
for n in primes():
    if n < 30:
        s = s + str(n) + ','
    else:
        break

print('s:', s)

# 回数
import math


def is_palindrome(n):
    strs = str(n)
    count = len(strs)
    center = math.ceil(count // 2)
    i = 0
    j = count - 1
    while True:
        if j <= i:
            return True
        if strs[i] == strs[j]:
            i = i + 1
            j = j - 1
        else:
            return False


output = filter(is_palindrome, range(1, 1000))
print('1~1000:', list(output))
if list(filter(is_palindrome, range(1, 200))) == [1, 2, 3, 4, 5, 6, 7, 8, 9, 11, 22, 33, 44, 55, 66, 77, 88, 99, 101,
                                                  111, 121, 131, 141, 151, 161, 171, 181, 191]:
    print('测试成功!')
else:
    print('测试失败!')

# 排序函数

L = [('Bob', 75), ('Adam', 92), ('Bart', 66), ('Lisa', 88)]


def by_name(t):
    return t[0]


def by_score(t):
    return t[1]


print('sorted t1:', sorted(L, key=by_name))

print('sorted t2:', sorted(L, key=by_score, reverse=True))


# 返回函数 闭包 (没太掌握呀 写递增函数没搞定)

# 递增整数

def count():
    fs = []
    for i in range(1, 4):
        def f():
            return i * i

        fs.append(f)
    return fs


def createCounter():
    a = 0

    def counter():
        nonlocal a
        a += 1
        return a

    return counter


counterA = createCounter()
print(counterA(), counterA(), counterA(), counterA(), counterA())  # 1 2 3 4 5
counterB = createCounter()
if [counterB(), counterB(), counterB(), counterB()] == [1, 2, 3, 4]:
    print('测试通过!')
else:
    print('测试失败!')

# 匿名函数 lambda x: x + 1

counter = lambda x: x + 1
print(counter(1))

# 装饰器

# __name__
print('count: name', count.__name__, 'annotations ', count.__annotations__, 'class ', count.__class__, 'code',
      count.__code__)

import functools

def log(text):
    def decorator(func):
        @functools.wraps(func)
        def wrapper(*args, **kw):
            print('call %s() text:' % func.__name__, text)
            return func(*args, **kw)
        return wrapper
    return decorator


@log('new text')
def now():
    print('2018-8-27')

f = now
f()
print(f.__name__)

# 便函数

import functools

int2 = functools.partial(int, base=2)

print(int2('100'))

max10 = functools.partial(max, 10)

print(max10(1, 2, 3))
