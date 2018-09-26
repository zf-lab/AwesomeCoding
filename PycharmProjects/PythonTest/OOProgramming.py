
#! /usr/bin/env python3
# _*_ coding: utf-8 _*_

'OOP programming module'

__author__ = 'Fly'

import sys
import types

def test():
    args = sys.argv
    if len(args) == 1:
        print('Hello world')
    else:
        print("Error can't recognize you")

class Student(object):
    def __init__(self, name, score):
        self.__name = name
        self.__score = score
    def print_score(self):
        print(self.__name, 'got score:', self.__score)
    def get_name(self):
        return self.__name
    def get_score(self):
        return self.__score
    def set_score(self, score):
        self.__score = score

bart = Student('bart', 60)
bart.print_score()

bart.set_score(66)
print('name:', bart.get_name(), 'score:', bart.get_score())

class Animal(object):
    def run(self):
        print('Animal is running')
    def bark(object):
        object.bark()

class Dog(Animal):
    def __init__(self, name):
        self.__name = name
    def run(self):
        print('Dog is running')
class Cat(Animal):
    def run(self):
        print('Cat is running')
class Lion(object):
    def bark(self):
        print('aen awo!!!')
dog = Dog('qiaokeli')
cat = Cat()
animal = Animal()

cat.run()
animal.run()

print('dog Dog?', isinstance(dog, Dog))
print('dog Animal?', isinstance(dog, Animal))
# 动态语言的鸭子类型
Animal.bark(Lion())
# type
print(type(test))
# isinstance
print([1,2],'is tuple or list? :', isinstance([1,2], (list, tuple)))
# dir()
print(dir(dog))
# hasattr getattr
print(hasattr(dog, 'name'))
print(getattr(dog, 'name', 400))

if hasattr(dog, 'run'):
    fn = getattr(dog, 'run')
    fn()
# 实例属性和类属性
class Employee(object):
    name = 'Employee'
e = Employee()

print(e.name)

e.name = 'Michael'

print(e.name)
print(Employee.name)

del e.name

print(e.name)

# 面向对象 高级编程

class Student1(object):
    # __slots__ = ('name', 'age')
    pass

from types import MethodType

def set_age(self, age):
    self.age = age

s1 = Student1()
s1.name = 'feifei'
s1.set_age = MethodType(set_age, s1)
s1.set_age(25)
print('age:', s1.age)

Student1.set_age = set_age
s2 = Student1()
s2.set_age(26)
print('age2:', s2.age)

class Student2(object):

    @property
    def birth(self):
        return  self._birth
    @birth.setter
    def birth(self, value):
        self._birth = value
    @property
    def age(self):
        return 2018 - self._birth

s3 = Student2()

s3.birth = 1993

print('birth', s3.birth, 'age:', s3.age)

# 多继承

class FlyableMixIn(object):
    pass
class RunableMixIn(object):
    pass

class Mammal(Animal):
    pass

class Parrot(Animal, FlyableMixIn):
    # 鹦鹉
    pass

# 定制类

# 斐波那契序列
class Fib(object):
    def __init__(self):
        self.a, self.b = 0, 1
    def __iter__(self):
        return self
    def __next__(self):
        self.a, self.b = self.b, self.a + self.b
        if self.a > 100:
            raise StopIteration()
        return self.a
    def __getitem__(self, n):
        if isinstance(n, int):
            a, b = 1, 1
            for x in range(n):
                a, b = b, a + b
            return a
        if isinstance(n, slice):
            start = n.start
            stop = n.stop
            if start is None:
                start = 0
            a, b = 1, 1
            L = []
            for x in range(stop):
                if x >= start:
                    L.append(a)
                a, b = b, a + b
            return L


for n in Fib():
    print('fib item:', n)
print('list[5]', Fib()[5])

print('list[:5] =', Fib()[0:5])

# 枚举
from enum import Enum, unique

@unique
class Weekday(Enum):
    Sun = 0
    Mon = 1
    Tue = 2
    Wed = 3
    Thu = 4
    Fri = 5
    Sat = 6

day1 = Weekday.Mon

print('day1 =', day1)
print(Weekday['Tue'])
print(Weekday.Tue.value)
print(Weekday(6))

for name, member in Weekday.__members__.items():
    print(name, '=>', member)
# type

print('type =', type(Weekday))
day = Student2()
print('day', type(day))

def fn(self, name='world'):
    print('Hello, %s' % name)

Hello = type('Hello', (object,), dict(hello=fn))

h = Hello()
print('h type:', type(h))
h.hello()

# 错误处理 BaseException的派生类
try:
    print('try...')
    r = 10 / 2
    print('result =', r)
except ValueError as e:
    print('ValueError:', e)
except ZeroDivisionError as e:
    print('ZeroDivisionError:', e)
else:
    print('no error')
finally:
    print('finally...')
print('end')

from functools import reduce

def str2num(s):
    if '.' in s:
        return float(s)
    return int(s)
def calc(exp):
    ss = exp.split('+')
    ns = map(str2num, ss)
    return reduce(lambda acc, x: acc + x, ns)
def main():
    r = calc('100 + 200 + 345')
    print('100 + 200 + 345 =', r)
    r = calc('99 + 88 +7.6')
    print('99 + 88 + 7.6 =', r)

main()

# 断言
def assertTest():
    n = int('0')
    assert n != 0, 'n is zero'
    return n / 10
# assertTest()

# logging debug info warning error
import logging
logging.basicConfig(level=logging.INFO)

def loggingTest():
    s = '0'
    n = int(s)
    logging.info('n = %d' % n)
    print(10 / n)
# loggingTest()

import pdb
# pdb python -m pdb OOProgramming.py 命令： n p s q c(单步继续) 断点： pdb.set_trace()

# 单元测试 TDD 测试驱动开发 python -m unittest OOProgramming.py
import unittest

class Dict(dict):
    '''
        Simple dict but also support access as x.y style.

        >>> d1 = Dict()
        >>> d1['x'] = 100
        >>> d1.x
        100
        >>> d1.y = 200
        >>> d1['y']
        200
        >>> d2 = Dict(a=1, b=2, c='3')
        >>> d2.c
        '3'
        >>> d2['empty']
        Traceback (most recent call last):
            ...
        KeyError: 'empty'
        >>> d2.empty
        Traceback (most recent call last):
            ...
        AttributeError: 'Dict' object has no attribute 'empty'
        '''
    def __init__(self, **kw):
        super().__init__(**kw)
    def __getattr__(self, item):
        try:
            return self[item]
        except KeyError:
            raise AttributeError(r"'Dict' object has no attribute '%s'" % item)
    def __setattr__(self, key, value):
        self[key] = value
# 文档测试
class TestDict(unittest.TestCase):

    def setUp(self):
        print('setup ...')

    def tearDown(self):
        print('tearDown ///')

    def test_init(self):
        d = Dict(a=1, b='test')
        self.assertEqual(d.a, 1)
        self.assertEqual(d.b, 'test')
        self.assertTrue(isinstance(d, dict))

    def test_key(self):
        d = Dict()
        d['key'] = 'value'
        self.assertEqual(d.key, 'value')

    def test_attr(self):
        d = Dict()
        d.key = 'value'
        self.assertTrue('key' in d)
        self.assertEqual(d['key'], 'value')

    def test_keyerror(self):
        d = Dict()
        with self.assertRaises(KeyError):
            value = d['empty']

    def test_attrerror(self):
        d = Dict()
        with self.assertRaises(AttributeError):
            value = d.empty
# -m unittest时去掉
if __name__ == '__main__':
    # unittest.main()
    import doctest
    doctest.testmod()
