<?php
/** 状态，信息，错误码 */
namespace app\lib\exception;

use think\Exception;

class BaseException extends Exception{
    public $code=400;
    public $msg='参数错误';
    public $errorCode='10000';
}