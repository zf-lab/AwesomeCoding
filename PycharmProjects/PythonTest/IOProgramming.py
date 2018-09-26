
# IO编程

# 同步IO 异步IO 轮询和回调

# 文件读写

with  open('/Users/mac/Desktop/test.txt', 'a', encoding='utf8') as f:
    f.write('\nnihao, youyou')

try:
    f = open('/Users/mac/Desktop/test.txt', 'r', encoding='gbk')
    print(f.read())
except BaseException as e:
    print('Exception:', e)
finally:
    if f:
        f.close()

from io import StringIO
f = StringIO()
f.write('hello')
f.write(' ')
f.write('world!')
print(f.getvalue())

f1 = StringIO('Hello!\nnihao!\ngoodbye!\nzaijian!')
while True:
    s = f1.readline()
    if s == '':
        break
    print(s.strip())

from io import BytesIO

f2 = BytesIO()
f2.write('中文'.encode('utf-8'))
print(f2.getvalue())

f3 = BytesIO(f2.getvalue())
print(f3.read())

# 操作文件和目录
import os

print(os.name)
print(os.uname())
print(os.environ)
print(os.environ.get('PATH'))

print(os.path.abspath('.'))

# os.path.join('/Users/mac/Desktop','testdir')
# os.mkdir('/Users//mac/Desktop/testdir')
# os.rmdir('/Users//mac/Desktop/testdir')

# 列出当前目录下所有.py文件
print([x for x in os.listdir('.') if os.path.isfile(x) and os.path.splitext(x)[1] == '.py'])

# 序列化 json dump() load()

import json

d = dict(name='Bob', age=20, score=88)
json_str = json.dumps(d)
newD = json.loads(json_str)
print('json_str:', json_str)
print('newD:', newD)
