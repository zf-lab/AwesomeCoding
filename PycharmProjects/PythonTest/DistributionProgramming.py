# 分布式编程

import random, time, queue
from multiprocessing.managers import BaseManager

# 发送任务的队列
task_queue = queue.Queue()
# 接受任务的队列
result_queue = queue.Queue()

class QueueManager(BaseManager):
    pass

QueueManager.register('get_task_queue', callable=lambda: task_queue)
QueueManager.register('get_result_queue', callable=lambda: result_queue)

# 绑定端口5000 设置密码
manager = QueueManager(address=('', 5000), authkey=b'123456')
# 启动queue

manager.start()
# 获取网络中的queue 对象
task = manager.get_task_queue()
result = manager.get_result_queue()

# 放几个任务进去
for i in range(10):
    n = random.randint(0, 10000)
    print('Put task %d ...' % n)
    task.put(n)
# 从result队列读取结果
print('Try get result ...')
for i in range(10):
    r = result.get(timeout=10)
    print('Result : %s ' % r)
# 关闭
manager.shutdown()
print('master exit')

# import time, sys, queue
# from multiprocessing.managers import BaseManager
#
# class QueueManager(BaseManager):
#     pass
#
# QueueManager.register('get_task_queue')
# QueueManager.register('get_result_queue')
#
# server_addr = '127.0.0.1'
# manager1 = QueueManager((server_addr, 5000), authkey=b'123456')
#
# manager1.connect()

task1 = manager1.get_task_queue()
result1 = manager1.get_result_queue()

for i in range(10):
    try:
        n = task.get(timeout=1)
        print('run task %d * %d ...' % (n, n))
        r = '%d * %d = %d ' % (n, n, n*n)
        time.sleep(1)
        result.put(r)
    except queue.Empty:
        print('task queue is empty')
print('worker exit')