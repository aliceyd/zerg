<?php
/**全局 goCheck() */
namespace app\api\validate;

use app\lib\exception\ParameterException;
use think\Exception;
use think\Request;
use think\Validate;

class BaseValidate extends Validate{
    public function goCheck(){
        //获取http传入的参数
        //对这些参数做检验
        $request=Request::instance();//拿到request实例对象
        $params=$request->param();//获取所有参数

        $result=$this->check($params);//记录验证结果
        if(!$result){
            $e=new ParameterException();
            $e->msg=$this->error;
            throw $e;

            // $error=$this->error;//拿到验证信息
            // throw new Exception($error);//抛出异常
        }else{
            return true;
        }
    }
}