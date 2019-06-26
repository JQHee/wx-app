<?php
/**
 * Created by PhpStorm.
 * User: midland
 * Date: 2019-06-26
 * Time: 10:35
 */


namespace app\api\controller;


use think\Controller;
use app\api\service\Token as TokenService;

/**
 * BaseController 控制器基类
 * @package app\api\controller
 */
class BaseController  extends Controller
{
    /**
     * 前置方法 检测作用域权限 允许用户以上权限
     */
    protected function checkPrimaryScope()
    {
        TokenService::needPrimaryScope();
    }
    /**
     * 前置方法 检测权限作用域 只允许用户访问
     */
    protected function checkExclusiveScope()
    {
        TokenService::needExclusiveScope();
    }

}