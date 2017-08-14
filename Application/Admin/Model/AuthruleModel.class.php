<?php

namespace Admin\Model;

use Think\Model;

//权限管理规则模型
class AuthruleModel extends Model
{	
	protected $tableName = 'auth_rule';

	/**
	 * 添加规则
	 * @param [type] $info 规则信息
	 * @return  lastId 
	 */
	public function addRule($info)
	{	
		if (empty($info['condition'])) {
			$info['condition'] = '';
		}
		if (empty($info['status'])) {
			$info['status'] = '0';
		}
		$data = [
			'name'	=>	$info['name'],
			'title'	=>	$info['title'],
			'condition'=>$info['condition'],
			'status'=>	$info['status'],
			'classify'	=>	$info['classify']
		];
		return M('auth_rule')->add($data);
	}
	/**
	 * 修改规则
	 * @param  [type] $info 规则信息
	 * @return lastId
	 */
	public function editRule($info)
	{	
		if (empty($info['condition'])) {
			$info['condition'] = '';
		}
		if (empty($info['status'])) {
			$info['status'] = '0';
		}
		$data = [
			'name'	=>	$info['name'],
			'title'	=>	$info['title'],
			'condition'=>$info['condition'],
			'status'=>	$info['status'],
			'classify'	=>	$info['classify']
		];
		return M('auth_rule')->where(['id'=>$info['id']])->save($data);
	}
}