<?php
/** 验证ID */
namespace app\api\validate;

class IDMustBePositiveInt extends BaseValidate{

    protected $rule=[
        'id'=>'require|isPositiveInteger'
    ];

    //验证是否为正整数
    protected function isPositiveInteger($value,$rule= '',$data= '',$field= ''){
        if(is_numeric($value) && is_int($value+0) && ($value+0) > 0){
            return true;
        }else{
            return $field.'必须是正整数';
        }
    }
}