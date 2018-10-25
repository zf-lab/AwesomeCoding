
# 常用内建模块

#1.datetime 模块 ...

from datetime import datetime

print(datetime.now())

#2. collections

#2.1 namedtuple

from collections import namedtuple

Point = namedtuple('Point', ['x', 'y'])
p = Point(1, 2)

print('p.y =', p.y)

print('is tuple', isinstance(p, tuple))

#2.2 deque 提高插入和删除效率
from collections import deque

q = deque(['a', 'b', 'c'])
q.append('x')
q.appendleft('y')
print('q =', q)
q.popleft()
print('q =', q)

#2.3 defaultdict
from collections import defaultdict
dd = defaultdict(lambda: 'N/A')

dd['key1'] = 'abc'
print('key1:', dd['key1'], 'key2:', dd['key2'])

#2.4 orderdict 实现FIFO队列
from collections import OrderedDict

d = dict([('a', 1), ('b', 2), ('c', 3)])

print('d =', d)

od = OrderedDict([('a', 1), ('b', 2), ('c', 3)])

print('od =', d)

class FIFOOrderDict(OrderedDict):
    def __init__(self, capacity):
        super(FIFOOrderDict, self).__init__()
        self._capacity = capacity
    def __setitem__(self, key, value):
        containsKey = 1 if key in self else 0
        if len(self) - containsKey >= self._capacity:
            last = self.popitem(last=False)
            print('remove:', last)
        if containsKey:
            del self[key]
            print('set:', (key, value))
        else:
            print('add:', (key, value))
        OrderedDict.__setitem__(self, key, value)

fifoDict = FIFOOrderDict(2)
fifoDict['a'] = 1
fifoDict['b'] = 2
print('fifo dict:', fifoDict)

fifoDict['c'] = 3
print('fifo dict:', fifoDict)

fifoDict['d'] = 4
print('fifo dict:', fifoDict)

#chainMap 命令行 > 环境变量 > 默认参数 dict的 dict 内部会排序

#user=admin color=green python3 use_chainmap.py -u bob

#counter
from collections import Counter

c = Counter()
for ch in 'Programming':
    c[ch] = c[ch] + 1
print('counter c:', c)

print('type(c):', type(c))
print('c is dict:', isinstance(c, dict))

#3 base64

