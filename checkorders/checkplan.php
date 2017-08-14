<?php
//处理订单24小时过期计时任务
include './Model.class.php';


$model1 = new Model('yp_orders');


$ordersData = $model1->field('id,endtime,status,orders_num')->where(['status'=>1])->select();

$newtime = time();

$model2 = new Model('yp_orders_detail');

$model3 = new Model('yp_goods_price');
foreach ($ordersData as $k=>$v) {
	if ($v['endtime'] <= $newtime) {
		$res = $model1->save(['status'=>5], $v['id']);

		$goodsData = $model2->field('goods_id,size,color,buynum')->where(["orders_num"=>$v['orders_num']])->select();


		foreach ($goodsData as $key=>$val) {
			 $goodsPriceData = $model3->field('store')->where(['goods_id'=>$val['goods_id'], 'color'=>$val['color'], 'size'=>$val['size']])->select();
			 
			 foreach ($goodsPriceData as $val2) {
			 	$val2['store'] = $val2['store'] + $val['buynum'];
			 	$res = $model3->saveStore(['store'=>$val2['store']], $val['goods_id'], $val['color'], $val['size']);
			 	var_dump($model3->_sql());
			 }
			 
		}

	}
		
}




