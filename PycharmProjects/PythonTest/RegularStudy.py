
# 正则表达式

# Python re 模块

import re
s = 'ABC\\-001'
s1 = r'ABC\-001'

match = re.match(s1, '010-12345')
match1 = re.match(s, 'ABC-001')
if match:
    print('match yes')
else:
    print('match not')

if match1:
    print('match1 yes')
else:
    print('match1 no')


print(match1)

# 切分字符串
valid = re.split(r'[\s\,\;]+', 'a,b;; c   d')

print(valid)

# 分组

m = re.match(r'^(\d{3})\-(\d{3,8}$)', '010-12345')
print(m)

for i in range(3):
    print('group %d = %s' % (i,m.group(i)))

# 贪婪匹配

print('贪婪算法', re.match(r'^(\d+?)(0*)$', '1102300').groups())

re_telephone = re.compile(r'^(\d{3})\-(\d{3,8})$')
print(re_telephone.match('010-12345').groups())
print(re_telephone.match('010-15343412').groups())

# Email识别

def is_valid_email(addr):
    match = re.match(r'^[a-z]+[a-z\.]*[a-z]\@[a-z]+\.com$', addr)
    if match:
        return True
    else:
        return False

str = 'someone@gmail.com'
str1 = 'bill.gates@microsoft.com'

print('str match %d', is_valid_email(str))
print('str1 match %d', is_valid_email(str1))