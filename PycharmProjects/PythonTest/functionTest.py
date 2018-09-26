# function test

# _*_ coding: utf-8 _*_

import math

def my_abs(x):
    if not isinstance(x,(int, float)):
        raise TypeError('bad operand type')
    elif x >= 0:
        return x
    else:
        return -x

# print(my_abs(-1024))
def move(x, y, step, angle=0):
    nx = x + step * math.cos(angle)
    ny = y + step * math.sin(angle)

    return nx, ny
#可变参数 tuple或者list
def calcSum(*nums):
    sum = 0
    for n in nums:
        sum =  sum + n * n
    return sum

# print(calcSum(1,2))
# numbers = [1,2,3,5]
# print(calcSum(*numbers))

# 关键字参数 dict
def person( name , age , **kw ):
    print('name :', name, 'age:', age, 'other:', kw)
person('junjun', 28, stature = '1.5', sex = 'female')

# 命名关键字
def key_person(name, age, *, city='beijing', job, level):
    print('name :', name, 'age :', age, 'city :', city, 'job :', job, 'level :', level)

# key_person('feifei', 25, job='iOS developer', level='level2')

# 参数组合 复杂参数组合

def muti_person(a, b=0, *, key, value, **kw):
    print('a :', a, 'b :', b, 'key :', key, 'value :', value, 'kw :', kw)

# kw = {'name': 'feifei','age': 25}
# muti_person(1, 2, key='key', value='value', **kw)

# 递归函数 防止栈溢出 尾递归优化

def fact(n, sum):
    if n == 1:
        return sum
    return fact(n-1, sum + n)

print('sum =', fact(10,1))