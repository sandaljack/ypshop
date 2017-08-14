<?php

namespace Admin\Model;

use Think\Model;

//权限管理组模型
class AuthgroupModel extends Model
{
	protected $tableName = 'auth_group';

	/**
	 * 添加用户组
	 * @param [type] $info 组信息
	 * @return  lastId
	 */
	public function addGroup($info)
	{	
		if (empty($info['function'])) {
			$info['function'] = '';
		}
		if (empty($info['status'])) {
			$info['status'] = '0';
		}
		//将权限规则拼接
		$groupRule = join($info['check'], ',');
		
		$data = [
			'title'	=>	$info['name'],
			'rules'	=>  $groupRule,
			'function'=>$info['function'],
			'status'=>	$info['status']
		];
		return M('auth_group')->add($data);
	}
	/**
	 * 修改用户组信息
	 * @param  [type] $info 组信息
	 * @return lastId
	 */
	public function upGroup($info)
	{
		if (empty($info['function'])) {
			$info['function'] = '';
		}
		if (empty($info['status'])) {
			$info['status'] = '0';
		}
		//将权限规则拼接
		$groupRule = join($info['check'], ',');
		
		$data = [
			'title'	=>	$info['name'],
			'rules'	=>  $groupRule,
			'function'=>$info['function'],
			'status'=>	$info['status']
		];
		return M('auth_group')->where(['id'=>$info['id']])->save($data);
	}


}