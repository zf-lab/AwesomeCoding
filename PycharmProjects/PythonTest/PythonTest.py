# name.py
import math
print ('hello world')

print("it's me!")

name = 'meimei'#input("what's your name ?")

print("hello "+name+' !')

if name == 'gege':
    print('nihao')
elif name == 'meimei':
    print('liangmei nihao')
else:
    print('error')
j = 0;
string = ''
for i in range(10):
    string = string + ',' + str(i)
    i = i + 2
    j = j + 1
print('str = ' + str(string))

print('0xf = ', 0xf)
print('011 = ', 0o11)
print('1.23e9', 1.23e9)
print("""
    it's me
    what about you
    what's your name
    how old are you
    do you love me
    yes give me your hand!""")
print('it\'s me how are you') # if you ask me who you really are i am your old brother

print('''line1
...line2
...line3''')
print(math.pi)

print(10 // 3 )

print('%5d - %12d' % (3,1))

print('hello, {0} ,成绩提升了 {1:.2f}%'.format('小明',20.12345))

print([1, 2, 3])
print((1,))
t = (4, 5, ['a','b'])
t[2][0] = 'c'
t[2][1] = 'd'
print(t)

names = ['feifei', 'junjun', 'mimi', 'jiajia']
for name in names:
    print(name)
print(list(range(5)))

for x in range(6,15):
    print('x =', x)

sum = 0;
n = 10
while n > 0:
    sum = sum + n
    n = n -1
print('sum =',sum)

# list tuple dict and set
dict = {'junjun': 'daijian feifei','mimi': 'ai lian feifei'}
print('do {0} in your heart?'.format('mimi'))
print('mimi',str('mimi' in dict) ,dict['mimi'])
print('do {0} in your heart?'.format('junjun'))
print('junjun',dict['junjun'])

print('jiajia',dict.get('jiajia','do not'),'in my heart')

dict['xinxin'] = 'is a good friend'
print('friend',dict)
dict.pop('xinxin')
print('lover=',dict)

lovers = set(['junjun', 'mimi'])
print('lover set=',lovers)

lovers.add('xinxin')
lovers.add('xinxin')
lovers.add('xinxin')
print('friends =',lovers)
lovers.remove('xinxin')
print('lovers =',lovers)

