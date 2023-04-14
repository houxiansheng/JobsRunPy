class Command:
    def __init__(self):
        self.routeList = {}
        self.scheduleList = {}
        self.SetRoute()
        self.SetSchedule()
    def SetRoute(self):
        self.routeList["test_command"] = {"min_pnum": 1, "max_pnum": 1, "min_exectime": 300,
                                          "interval_time": 60, "loopnum": 1, "loopsleepms": 10, "crontab": "0 */2 * * * *"}

    def SetSchedule(self):
        self.scheduleList['test_command']=[
            {"ccc": 1234}
        ]

    def printcc(self):
        print(self.routeList)
        print(self.scheduleList)
