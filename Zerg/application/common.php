<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
/**
 * 分页json返回的格式
 * @param $code
 * @param string $msg
 * @param int $result
 * @param $count
 * @param array $data
 */
function page_json($code, $msg="",$result = 1, $count, $data=array()){
    $result=array(
        'code'=>$code,
        'msg'=>$msg,
        'result'=>$result,
        'count'=>$count,
        'data'=>$data
    );
    //输出json
    echo json_encode($result);
    exit;
}

/**
 * 正常json返回格式
 * @param $code
 * @param string $msg
 * @param int $result
 * @param $data
 */
function n_json($code, $msg="", $result = 1, $data){
    $result=array(
        'code'=>$code,
        'msg'=>$msg,
        'result'=>$result,
        'data'=>$data
    );
    //输出json
    echo json_encode($result);
    exit;
}