<?php

namespace Home\Model;

use Think\Model;

class AddressModel extends Model
{
	protected $tableName = 'address';

	/**
     * 添加收货地址
     * @param [type] $data   收货地址数据
     * @param [type] $userId 用户id
     */
    public function addNewAddress($info, $userId)
    {       
    	$map = [
    		'user_id'	=>	$userId,
    		'add_default'	=>	1
    		];
    	$bool = M('address')->where($map)->find();
    	if ($bool) {
    		$data = [
	            'add_name'  =>  $info['buyname'],
	            'add_phone' =>  $info['buyphone'],
	            'add_province'=>$info['province'],
	            'add_city'  =>  $info['city'],
	            'add_area'  =>  $info['county'],
	            'add_detail'=>  $info['detail'],
	            'add_town'	=>	$info['town'],
	            'add_default'=> 0,
	            'user_id'   => $userId
        	];
    	} else {
    		$data = [
	            'add_name'  =>  $info['buyname'],
	            'add_phone' =>  $info['buyphone'],
	            'add_province'=>$info['province'],
	            'add_city'  =>  $info['city'],
	            'add_area'  =>  $info['county'],
	            'add_detail'=>  $info['detail'],
	            'add_town'	=>	$info['town'],
	            'add_default'=> 1,
	            'user_id'   => $userId
        	];
    	}
        
         $count = M('address')->where(['user_id'=>$userId])->count();
         if ($count < 5) {
         	$addid = M('address')->where(['user_id'=>$userId])->add($data);
	         //修改别的地址不为默认地址
	         return $addid;
         } else {
         	return false;
         }
         
    }

    //修改收货地址
    public function upAddress($info, $userId)
    {
		$data = [
            'add_name'  =>  $info['buyname'],
            'add_phone' =>  $info['buyphone'],
            'add_province'=>$info['province'],
            'add_city'  =>  $info['city'],
            'add_area'  =>  $info['county'],
            'add_detail'=>  $info['detail'],
            'add_town'	=>	$info['town'],
    	];

        return M('address')->where(['userid'=>$userId, 'id'=>$info['id']])->save($data);

    }

}