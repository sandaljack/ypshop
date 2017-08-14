<?php

namespace Admin\Model;

use Think\Model;

class ShowgoodsModel extends Model
{
	//解决D方法直接查数据库，虚拟模型的问题
	protected $autoCheckFields = false;

	/**
	 * [firstSort 第一次打开页面时查询yp_first_sort表中的名字]
	 * @return [array] [yp_first_sort表中的名字数据]
	 */
	public function firstSort()
	{

		//拿取响应的数据
		$firstsortData = M('first_sort')->field(['id','name'])->select();

		//返回数据
		return $firstsortData;
	}


}