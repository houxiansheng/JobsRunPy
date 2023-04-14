<?php
/**
 * 全局变量
 */
namespace WolfansSm\Library\Share;

use WolfansSm\Library\Schedule\Register;

class GlobalVar {
    static function initUuid() {
        !defined('WOLFANS_UUID') && define('WOLFANS_UUID', Register::getTitle() . '-' . date('mdHis'));
    }

    static function getUuid() {
        self::initUuid();
        return WOLFANS_UUID;
    }
}