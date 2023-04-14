import command.command as mm
from multiprocessing import Process
import src.master as master
from src.library.core.crobiter import (croniter, CroniterBadDateError,  CroniterBadCronError, datetime_to_timestamp,
                                       CroniterNotAlphaError, CroniterUnsupportedSyntaxError)
import datetime
import time
from src.library.exec.crontab import Crontab
from src.library.exec.eye import Eye

tt = mm.Command()
tt.printcc()

mm = master.Master()
mm.setCommand(tt)
base = datetime.datetime(2010, 8, 25)
print(datetime.time())
print(base)
print("sdfghjkl")
iter = croniter('* * * * * 50')
# print(crobiter.is_valid('0 0 1 * *'))
ttc = iter.get_next()
# print(datetime.date())
print(time.strftime("%Y-%m-%d %H:%M:%S", time.localtime(iter.get_next())))
print(time.strftime("%Y-%m-%d %H:%M:%S", time.localtime(iter.get_next())))
print(time.strftime("%Y-%m-%d %H:%M:%S", time.localtime(iter.get_next())))
print(time.strftime("%Y-%m-%d %H:%M:%S", time.localtime(iter.get_next())))
print(time.strftime("%Y-%m-%d %H:%M:%S", time.localtime(iter.get_current())))
# print(time.strftime("%Y-%m-%d %H:%M:%S",time.localtime(1511515800)))
# print(iter.())
# print(crobitercrobiter.)
print(__name__)

# 创建新线程
# thread1 = cc.Crontab(1, "Thread-1", 1)
# thread2 = ee.eye(2, "Thread-2", 2)
 
# # 开启线程
# thread1.start()
# thread2.start()

# Process.

print('asdf')