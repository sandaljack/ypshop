<?php

namespace Admin\Model;

use Think\Model;

class SecondsortModel extends Model
{	
	//指定UsersModel模型操作的表是second_sort表
	protected $tableName = 'second_sort';

	//自动验证
	protected $_validate = array(

		array('name', 'require', '分类名不能为空', 1),
		array('name', '', '分类名已经存在！', 0, 'unique', 1 )
	);


}