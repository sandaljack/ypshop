<?php

namespace Admin\Model;

use Think\Model;

class FirstsortModel extends Model
{	
	//指定UsersModel模型操作的表是first_sort表
	protected $tableName = 'first_sort';

	//自动验证
	protected $_validate = array(

		array('name', 'require', '分类名不能为空', 1),
		array('name', '', '分类名已经存在！', 0, 'unique', 1 )
	);

	//查询已存在的一级商品分类
	public function checksort() {

		$list = ['name','id'];

		return $this->field($list)->select();

	}

}

