<?php 
	
namespace Admin\Model;

use Think\Model;

class AdminuserModel extends Model
{
	//解决D方法直接查数据库，虚拟模型的问题
	protected $autoCheckFields = false;

	/**
	 * [deleteAdminUser 删除前台的用户]
	 * @param  [number] $id [用户id]
	 * @return [bool]     [这个是受影响行数：1，删除成功；0 删除失败。]
	 */
	public function deleteUser($id)
	{
		$deleteUser = M('adminuser')->where(['id'=>$id])->delete();
		//返回布尔值，1成功， 0失败
		return $deleteUser;
	}

	/**
	 * 修改名字
	 * @param  [type] $name 名字
	 * @return 
	 */
	public function seachName($name){

		$like ='%'.$name.'%';

		$where['username'] = array('like',$like);

		//实例化
		$user = M('adminuser');

		$usernames = $user->field('id,username,userpic,email,phone,status')->where($where)->select();

		return $usernames;

	}


}