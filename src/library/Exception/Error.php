<?php
namespace WolfansSm\Library\Exception;

class Error {

    function getLastError() {
        if (function_exists('error_get_last')) {
            $error = error_get_last();
            global $argv;
            if ($error) {
                $str = '[process_last_error] process:' . implode(" ", $argv) . ' error:' . json_encode($error);
                \Eagle\Tools\Log::err($str);
            }
        }
    }
}