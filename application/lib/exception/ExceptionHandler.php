<?php
/** 全局异常处理 */
namespace app\lib\exception;

use think\Exception;
use think\exception\Handle;
use think\Log;
use think\Request;

class ExceptionHandler extends Handle{
    private $code;
    private $msg;
    private $errorCode;
    public function render(\Exception $e)
    {
        if($e instanceof BaseException){
            $this->code=$e->code;
            $this->msg=$e->msg;
            $this->errorCode=$e->errorCode;
        }else{
            echo '3242';
            //错误页面展示
            if(config('app_debug')){
                return parent::render($e);
            }else{
                $this->code=500;
                $this->msg='服务器内部错误';
                $this->errorCode=999;
                $this->recordErrorLog($e);
            }
        }
        $request=Request::instance();
        $result=[
            'msg'=>$this->msg,
            'erroe_code'=>$this->errorCode,
            'request_url'=>$request->url()
        ];
        return json($result,$this->code);
    }

    //error日志记录
    private function recordErrorLog(Exception $e){
        Log::init([
            'type'=>'File',
            'path'=>LOG_PATH,
            'level'=>['error']
        ]);
        Log::record($e->getMessage(),'error');
    }
}