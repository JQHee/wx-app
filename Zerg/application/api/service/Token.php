<?php
/**
 * Created by PhpStorm.
 * User: midland
 * Date: 2019-06-26
 * Time: 09:44
 */

namespace app\api\service;

use app\lib\enum\ScopeEnum;
use app\lib\exception\ForbiddenException;
use app\lib\exception\ParameterException;
use app\lib\exception\TokenException;
use think\Cache;
use think\Request;


class Token
{
    /**
     * 生成加密Token
     * @return string Token令牌
     */
    public static function generateToken()
    {
        //用三组字符串进行MD5加密
        //32位字符串组成一组随机字符串
        $randChar = getRandChar(32);
        //获取时间戳
        $timeStamp = $_SERVER['REQUEST_TIME_FLOAT'];
        //salt 盐
        $salt = config('secure.token_salt');
        return md5($randChar.$timeStamp.$salt);
    }

    /**
     * 从缓存中获取某个值 (获取header中的token)
     * @param $key
     * @return mixed
     * @throws TokenException
     */
    public static function getCurrentTokenVar($key)
    {
        //从Header中获取Token
        $token = Request::instance()->header('token');
        //获取缓存信息
        $vars = Cache::get($token);
        //抛出异常
        if(!$vars)
        {
            throw new TokenException();
        }
        else
        {
            if(!is_array($vars))
            {
                //转换JSON格式为数组
                $vars = json_decode($vars, true);
            }
            //如果缓存里不存在需要的Key 抛出异常
            if(array_key_exists($key, $vars))
            {
                return $vars[$key];
            }
            else
            {
                throw new Exception('尝试获取的Token变量并不存在');
            }
        }
    }

    /**
     * 获取用户ID
     * @return String 用户ID
     */
    public static function getCurrentUid()
    {
        //获取Token
        return self::getCurrentTokenVar('uid');
    }

    /**
     * 前置方法 权限作用域检测  允许用户以上级别访问
     * @return bool true or exception
     * @throws ForbiddenException 权限异常类
     * @throws TokenException  Token异常类
     */
    public static function needPrimaryScope()
    {
        //获取Token中的作用域
        $scope = self::getCurrentTokenVar('scope');
        //抛出Token异常
        if (!$scope) throw new TokenException();
        //检验是否在作用域内
        if ($scope >= ScopeEnum::User)
        {
            return true;
        }
        else
        {
            //抛出前置方法异常
            throw new ForbiddenException();
        }
    }
    /**
     * 前置方法 权限作用域检测 只允许用户方法
     * @return bool true or exception
     * @throws ForbiddenException 权限异常类
     * @throws TokenException Token异常类
     */
    public static function needExclusiveScope()
    {
        //获取Token中的作用域
        $scope = self::getCurrentTokenVar('scope');
        //抛出Token异常
        if(!$scope) throw new TokenException();
        //判断是否符合权限作用域
        if($scope == ScopeEnum::User)
        {
            return true;
        }
        else
        {
            //抛出权限异常
            throw new ForbiddenException();
        }
    }
    /**
     * 检测传入的用户ID是否是当前用户UID
     * @param $checkedUID 被检测的用户ID
     * @return bool　true or false
     * @throws ParameterException 通用异常
     */
    public static function isValidOperate($checkedUID)
    {
        if(!$checkedUID)
        {
            //如果被检测的UID为空　抛出通用异常
            throw new ParameterException([
                'msg' => '检查的UID时必须传入一个被检查的UID',
                'code' => 402,
            ]);
        }
        $currentOperateUID = self::getCurrentUid();
        return $checkedUID == $currentOperateUID ? true : false;
    }
}