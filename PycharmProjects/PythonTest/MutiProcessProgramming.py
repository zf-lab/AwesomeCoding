
print('MultiProcessProgramming')

# Unix 多进程创建 fork
#
# import os
#
# print('Process (%s) start...' % os.getpid())
#
# pid = os.fork()
#
# if pid == 0:
#     print('I am child process(%s) and parent is %s' % (os.getpid(),os.getppid()))
# else:
#     print('I (%s) just created a child process (%s)' % (os.getpid(), pid))
#
# # multiprocessing windows 可用 跨平台的方法
#
# from multiprocessing import Process
# import os
#
# # 子进程要执行的代码
#
# def run_proc(name):
#     print('Run child process %s (%s)...' % (name, os.getpid()))
#
# if __name__ == '__main__':
#     print('Parent process %s.' % os.getpid())
#     p = Process(target=run_proc, args=('test',))
#     p.start();
#     p.join();
#     print('Child process end.')

# Pool 启动大量子进程 进程池
from multiprocessing import Pool
import os, time, random

def long_time_task(name):
    print('Run task %s (%s) ...' % (name, os.getpid()))
    start = time.time()
    time.sleep(random.random() * 3)
    end = time.time()
    print('task %s runs %.02f seconds .' % (name, (end - start)))

if __name__ == '__main__':
    print('Parent progress %s.' % os.getpid())
    p = Pool(4)
    for i in range(5):
        p.apply_async(long_time_task, args=(i,))
    print('Waiting for all sub process done...')
    p.close()
    p.join()
    print('All sub process done.')

# 子进程
# 进程间 通信

# 多线程
