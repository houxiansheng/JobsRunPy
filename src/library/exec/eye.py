# import threading
# class eye(threading.Thread):
class Eye():
    def __init__(self, threadID, name, counter):
        # threading.Thread.__init__(self)
        self.threadID = threadID
        self.name = name
        self.counter = counter