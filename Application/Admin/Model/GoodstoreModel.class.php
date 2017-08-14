<?php
	
namespace Admin\Model;

use Think\Model;

class GoodstoreModel extends Model
{
	//解决D方法直接查数据库，虚拟模型的问题
	protected $autoCheckFields = false;

	//自动验证
	protected $_validate = array(

		array('store', 'require', '库存数量不能为空', 1),
		array('size', 'require', '商品尺码不能为空', 1),
		array('color', 'require', '商品颜色不能为空', 1),
		array('price', 'require', '商品价格不能为空', 0)
	);

	public function addstores()
	{

		$storeData = I('post.');


		$list = [
			'goods_id' => $storeData['goodId'],
			'size'     => $storeData['size']
		];

	
		//实例化model类
		$Model = M();

		//开启事务
		$Model->startTrans();

		if (!$sizeData) {

			M('goods_size')->field(['goods_id', 'size'])->data($list)->add();

		}

		$priceData = [
			'goods_id' => $storeData['goodId'],
			'store'    => $storeData['store'],
			'color'    => $storeData['color'],
			'price'    => $storeData['price'],
			'size'     => $storeData['size']
		];

		$goodsPrice = M('goods_price')->field(['goods_id', 'store', 'color', 'price', 'size'])->data($priceData)->add();


		if ($goodsPrice) {

			$Model->commit();//事务提交

			$info = '库存信息插入成功';

			return $info;

		} else {

			$Model->rollback();//事务回滚
		}

	}

	public function changestores() 
	{
		$changeData = I('post.');

		//实例化model类
		$Model = M();

		//开启事务
		$Model->startTrans();
		
		$list = ['color', 'size', 'price', 'store'];

		$storeData = [
			'color' => $changeData['color'],
			'size'  => $changeData['size'],
			'price' => $changeData['price'],
			'store' => $changeData['store'],
			
		];

	
		$stores = M('goods_price')->field($list)->where(['id'=>$changeData['storeId']])->setField($storeData);


		if ($stores) {

			$Model->commit();//事务提交

			return '修改成功';

		} else {

			$Model->rollback();//事务回滚

		}

	}
}