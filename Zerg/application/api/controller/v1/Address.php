<?php
/**
 * Created by PhpStorm.
 * User: midland
 * Date: 2019-06-26
 * Time: 10:36
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\validate\AddressNew;
use app\api\service\Token as TokenService;
use app\api\model\User as UerModel;
use app\lib\exception\UserException;

class Address extends BaseController
{
    /**
     * 访问某个方法前先执行前置方法
     * @var array 前置方法=>只有=>触发前置操作的方法
     */
    protected $beforeActionList = [
        'checkPrimaryScope' => ['only' => 'createOrUpdateAddress']
    ];

    /**
     * 创建或更新用户地址
     * @return SuccessMessage
     * @throws UserException
     */
    public function createOrUpdateAddress() {
        //根据Token获取用户UID
        //根据用户UID来查找用户数据，判断用户是否存在，如果不存在抛出异常
        //获取客户从客户端提交的地址信息
        //根据用户地址信息是否存在，从而判断是添加地址还是更新地址

        $validate =  new AddressNew();
        $validate -> goCheck();

        // 获取当前用户uid
        $uid = TokenService::getCurrentUid();
        // 获取用户信息
        $user = UerModel::get($uid);
        if($user) {
            throw new UserException();
        }

        //用户提交的数据
        $dataArray = $validate->getDataByRule(input('post.'));
        //获取到的用户地址
        $userAddress = $user->address;
        if(!$userAddress)
        {
            //新增用户地址
            $user->address()->save($dataArray);
        }
        else
        {
            //更新用户地址
            $user->address->save($dataArray);
        }
        return n_json(200, 'ok', 1, []);

    }

}