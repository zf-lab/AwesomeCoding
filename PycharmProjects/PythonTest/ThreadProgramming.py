# 多线程

import time, threading

def loop():
    print('thread %s is running ...' % threading.current_thread().name)
    n = 0
    while n < 5:
        n = n + 1
        print('thread %s >>. %s' % (threading.current_thread().name, n))
        time.sleep(1)
    print('thread %s ended' % threading.current_thread().name)
t = threading.Thread(target=loop, name='LoopThread')
t.start()
t.join()
print('thread %s ended.' % threading.current_thread().name)

#Lock
# balance = 0
# lock = threading.Lock()
# lock.acquire()
# lock.release()

# 多核CPU

# ThreadLocal 全局可用 添加的属性 可在每个thread中读写

import threading

#创建全局 threadlocal 对象
local_school = threading.local()

def process_student():
    # 获取当前进程的student对象
    std = local_school.student
    print('hello , %s (in %s )' % (std, threading.current_thread().name))

def process_thread(name):
    # 绑定threadlocal的student
    local_school.student = name
    process_student()
t1 = threading.Thread(target= process_thread, args=('Junjun',), name='Thread-A')
t2 = threading.Thread(target= process_thread, args=('Mimi',), name='Thread-B')

t1.start()
t2.start()
t1.join()
t2.join()