<?php
/**
 * 注册要启动的任务
 */
namespace WolfansSm\Library\Schedule;

use WolfansSm\Library\Share\Table;

class Register {
    protected static $command      = [];
    protected static $httpPort     = null;
    protected static $httpIp       = null;
    protected static $allHttpPort  = [];
    protected static $ipList       = [];
    protected static $eyeRedisPort = []; //监控redis配置信息
    protected static $alarmHook    = ''; //报警邮件地址
    protected static $title        = ''; //任务标题

    public static function setCommand(Command $command) {
        $taskId = $command->getTaskId();
        if (!$taskId) {
            var_dump('Command 缺少taskid');
            exit();
        }
        if (isset(self::$command[$taskId])) {
            var_dump('Command 存在重复taskid');
            exit();
        }
        self::$command[$taskId]['command'] = $command;
        foreach ($command->getRouteList() as $routeId => $options) {
            $schedule = new Schedule($taskId, $routeId);
            //配置参数
            foreach ($options as $key => $val) {
                $schedule->setOptions($key, $val);
            }
            //配置任务
            foreach ($command->getScheduleList($routeId) as $class) {
                $schedule->setTask($class);
            }
            self::$command[$taskId]['route_list'][$routeId] = $schedule;
        }
    }

    /**
     * @param $taskId
     */
    /**
     * @param $taskId
     *
     * @return Command
     */
    public static function getCommand($taskId) {
        if (!$taskId) {

        }
        if (!isset(self::$command[$taskId])) {

        }
        return self::$command[$taskId];
    }

    public function __construct() {
    }

    public static function setHttpPort($port) {

        if (isset(self::$allHttpPort[$port])) {
            return false;
        } else {
            self::$allHttpPort[$port] = $port;
            return true;
        }
    }

    public static function getHttpPortList() {
        return array_values(self::$allHttpPort);
    }

    public static function setListenHttpPort($port) {
        self::$httpPort = $port;
    }

    public static function getListenHttpPort() {
        return self::$httpPort;
    }

    public static function setListenHttpIp($ip) {
        self::$httpIp = $ip;
    }

    public static function getListenHttpIp() {
        return self::$httpIp;
    }

    public static function setHttpIpList($ipList) {
        self::$ipList = $ipList;
    }

    public static function getHttpIpList() {
        return self::$ipList;
    }

    public static function setEyeRedisConfig($host, $port, $db = 0) {
        self::$eyeRedisPort = [
            'host'   => $host,
            'port'   => $port,
            'select' => $db
        ];
    }

    public static function getEyeRedisConfig() {
        return self::$eyeRedisPort;
    }

    /**
     * @param $url demo http://falcon.search.weibo.com/falcon/alarm?group=xianbiao&title=%s&content=%s    title content会自动替换
     */
    public static function setAlarmWebHook($url) {
        self::$alarmHook = $url;
    }

    public static function getAlarmWebHook() {
        return self::$alarmHook;
    }

    public static function setTitle($title) {
        self::$title = $title;
    }

    public static function getTitle() {
        return self::$title;
    }

    /**
     * 获取子任务
     *
     * @param $taskId
     * @param $routeId
     *
     * @return array|mixed
     */
    public static function getSchedules($taskId, $routeId) {
        if (isset(self::$command[$taskId]['route_list'][$routeId])) {
            return self::$command[$taskId]['route_list'][$routeId];
        } else {
            return [];
        }
    }

    public static function setCommandShareTable($taskId) {
        $commandList = self::getCommand($taskId);
        Table::init();
        foreach ($commandList['route_list'] as $routeId => $schedule) {
            Table::addSchedule($taskId, $routeId, $schedule->getOptions());
        }
    }
}
