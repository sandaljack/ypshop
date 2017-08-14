<?php

namespace Home\Model;

use Think\Model;

class PayModel extends Model
{
	protected $tableName = 'orders';
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
	         return $addid;
         } else {
         	return false;
         }
         
    }

    /**
     * 使用事务处理提交订单
     * @param  [type] $data   订单信息
     * @param  [type] $userId 用户id
     * @return [type]         [description]
     */
    public function transaction($data, $userId)
    {   
        //准备数据
        $gid = explode(',',rtrim($data['gid'], ','));
        $nums = explode(',',rtrim($data['nums'], ','));
        $color = explode(',',rtrim($data['color'], ','));
        $size = explode(',',rtrim($data['size'], ','));
        $addtime = date('Y-m-d H:i:s', time());
        //生成订单编号
        $orderId = 'yp'.$userId.'_'.time();

        //重新去数据库查商品价格
        $total = 0;
        foreach($gid as $k=>$v) {
            $priceDate = M('goods_price')->field('price')
            ->where(['goods_id'=>$v, 'color'=>$color[$k], 'size'=>$size[$k]])->find();
            $price = $priceDate['price'] * $nums[$k];
            $total = $total + intval($price);
        }

        //未支付过期时间
        $endtime = time()+86400;
        //实例化model类
        $Model = M();
        //开启事务
        $Model->startTrans();

        //插入订单表
        $dataOrder = [
            'orders_num'=>  $orderId,
            'user_id'   =>  $userId,
            'addtime'   =>  $addtime,
            'total'     =>  $total,
            'buymsg'    =>  $data['message'],
            'endtime'   =>  $endtime
        ];
        $addOrder = M('orders')->data($dataOrder)->add();

        // dump($addOrder);exit;
        //插入订单详情表
        $addOrderDetailAll = 1;
        foreach ($gid as $k=>$v) {
            $dataOrderDetail = [
                'orders_num'=>  $orderId,
                'buynum'    =>  $nums[$k],
                'goods_id'  =>  $v,
                'color'     =>  $color[$k],
                'size'      =>  $size[$k],
            ];
            $addOrderDetail = M('orders_detail')->data($dataOrderDetail)->add();
            //判断如果有一个不成功，都不成功
            if (!$addOrderDetail) {
                $addOrderDetailAll = null;
            }
            
        }

        //插入订单收货地址表
        $dataAddress = [
            'orders_num'=>  $orderId,
            'buyname'   =>  $data['buyuser'],
            'province'  =>  $data['province'],
            'city'      =>  $data['city'],
            'area'      =>  $data['area'],
            'detail'    =>  $data['street'],
            'phone'     =>  $data['buyphone'],
            'zipcode'   =>  $data['zipcode'],
            'email'     =>  $data['email'],
        ];
        $addAddress = M('orders_address')->data($dataAddress)->add();

        //修改商品库存
        $upAllGoodsInfo = 1;
        foreach ($gid as $k=>$v) {
            $map['goods_id'] = $v;
            $map['color'] = $color[$k];
            $map['size'] = $size[$k];
            $upGoodsInfo = M('goods_price')->where($map)->setDec('store', $nums[$k]);
            
            //判断如果有一个不成功，都不成功
            if (!$upGoodsInfo) {
                $upAllGoodsInfo = null;
            } else {
                //增加点击量
                M('goods')->where(['id'=>$v])->setInc('buynum', $nums[$k]);;
            }
            
        }

        //清空购物车所选的商品
        $map['user_id'] = $userId;
        $delAllShopcar = 1;
        $bool = M('shopcar')->where($map)->select();
        if ($bool) {

            foreach ($gid as $k=>$v) {
                $map['goods_id'] = $v;
                $map['color'] = $color[$k];
                $map['size'] = $size[$k];
                $delShopcar = M('shopcar')->where($map)->delete();
                
                if (!$delShopcar) {
                    $delAllShopcar = null;
                }
            }
        }
       

        if ($addOrder && $addOrderDetailAll && $addAddress && $upAllGoodsInfo && $delAllShopcar) {
             $info = $Model->commit();//事务提交
                    return [
                        'code' => 200,
                        'msg'  => '订单插入成功',
                        'info' => $dataOrder,
                    ];

        } else {
            $info = $Model->rollback();//事务回滚

            return [
                    'code' => 404,
                    'msg'  => '订单插入失败',
                    'info' => $dataOrder,
                ];

        }
        

    }
}