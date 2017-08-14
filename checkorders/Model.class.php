<?php
/**
 * 封装的数据库操作类
 * 对数据库某张表的增删改查
 */
include 'config.php';
class Model extends PDO
{
	protected $tname; 	//用于存储表名
	protected $sql; 	//用于存储最后一次执行的sql语句
	protected $allFields = []; 	//用于存储所有字段
	protected $limit = ''; 	//用于存储limit条件
	protected $where = ''; 	//用于存储where条件
	protected $order = ''; 	//用于存储order排序条件
	protected $field = '*'; //用于存储field字段条件

	public function __construct($tname)
	{
		parent::__construct('mysql:dbname='.DB.';charset=utf8', USER, PWD);

		// 设置错误模式
		$this->setAttribute(3, 1);

		//存储要操作的表名
		$this->tname = FIX.$tname;

		//存储数据表的所有字段
		$this->getFields();
	}

	public function getFields()
	{
		$sql = 'desc '.$this->tname;
		$this->sql = $sql;
		$res = $this->query($sql)->fetchAll(2);
		// var_dump($res);
		$arr = [];
		foreach ($res as $v) {
			$arr[] = $v['Field'];
		}
		$this->allFields = $arr;
	}

	/**
	 * 查询所有数据
	 * @return array 查到的所有数据二维数组
	 */
	public function select()
	{
		$sql = "select {$this->field} from {$this->tname} {$this->where} {$this->order} {$this->limit}";
		$this->sql = $sql;
		
		if ($stmt = $this->query($sql)) {
			return $stmt->fetchAll(2);
		}
		return [];
	}

	/**
	 * 根据id查询单条数据
	 * @param  int $id 要查询的ID号
	 * @return array     查到的一维数组
	 */
	public function find($id)
	{
		$sql = "select {$this->field} from {$this->tname} where id=$id limit 1";
		$this->sql = $sql;
		if ($stmt = $this->query($sql)) {
			return $stmt->fetch(2);
		}
		return [];
	}

	/**
	 * 统计总条数
	 * @return int 统计出来的总条数
	 */
	public function count()
	{
		$sql = "select count(*) total from {$this->tname} {$this->where}";
		$this->sql = $sql;
		if ($stmt = $this->query($sql)) {
			return (int)$stmt->fetch(2)['total'];
		}
		return 0;
	}

	/**
	 * 删除数据
	 * @param  int $id 要删除的id
	 * @return int     受影响的行数
	 */
	public function delete($id = null)
	{
		if ($id === null) {
			if ($this->where == '') return false;
			$sql = "delete from {$this->tname} {$this->where}";
		} else {
			$sql = "delete from {$this->tname} where id=$id";
		}
		$this->sql = $sql;
		return $this->exec($sql);
	}

	/**
	 * 添加数据
	 * @param arrar $data 要添加的数据数组
	 */
	public function add($data)
	{
		//过滤非法字段
		foreach ($data as $k=>$v) {
			if (!in_array($k, $this->allFields)) unset($data[$k]);
		}
		//非法数据
		if (empty($data)) return false;

		$keys = join(array_keys($data), '`,`');
		$vals = join($data, "','");
		$sql = "insert into {$this->tname}(`$keys`) values('$vals')";
		$this->sql = $sql;
		return $this->exec($sql);
	}

	/**
	 * 修改数据
	 * @param  array $data 要修改的数据数组
	 * @return int       受影响的行数
	 */
	public function save($data, $id)
	{	
		foreach ($data as $k=>$v) {
			if (!in_array($k, $this->allFields)) unset($data[$k]);
		}

		if (empty($data)) return false;
		$arr = [];
		foreach ($data as $k=>$v) {
			$str = "`$k`".'='."'$v'";
			$arr[] = $str;
		}
		$res = join($arr, ',');

		$sql = "update {$this->tname} set $res where id=$id";
		$this->sql = $sql;
		return $this->exec($sql);
	}

	/**
	 * 修改数据
	 * @param  array $data 要修改的数据数组
	 * @return int       受影响的行数
	 */
	public function saveStore($data, $id, $color, $size)
	{	
		foreach ($data as $k=>$v) {
			if (!in_array($k, $this->allFields)) unset($data[$k]);
		}

		if (empty($data)) return false;
		$arr = [];
		foreach ($data as $k=>$v) {
			$str = "`$k`".'='."'$v'";
			$arr[] = $str;
		}
		$res = join($arr, ',');

		$sql = "update {$this->tname} set $res where goods_id=$id and color='$color' and size='$size'";
		$this->sql = $sql;
		return $this->exec($sql);
	}

	/**
	 * limit条件
	 * @param  string $limit limit条件
	 * @return object 返回自己，保证连贯操作
	 */
	public function limit($limit)
	{
		$this->limit = 'limit '.$limit;
		return $this;
	}

	/**
	 * order条件
	 * @param  string $order order条件
	 * @return object 返回自己，保证连贯操作
	 */
	public function order($order)
	{	
		$this->order = 'order by '.$order;
		return $this;
	}

	/**
	 * 设置要查询的字段
	 * @param  string $field 指定需要的字段
	 * @return object 返回自己，保证连贯操作
	 */
	public function field($field)
	{
		$this->field = $field;
		return $this;
	}

	/**
	 * where条件
	 * @param  array $map 条件数组
	 * @return object 返回自己，保证连贯操作
	 */
	public function where($map)
	{
		if (empty($map) || !is_array($map)) return $this;

		//遍历条件数组
		foreach ($map as $k=>$v) {
			if (is_array($v)) {
				switch ($v[0]) {
					case 'gt':
						$tmp[] = "`$k` > '{$v[1]}'";
						break;
					case 'lt':
						$tmp[] = "`$k` < '{$v[1]}'";
						break;
					case 'like':
						$tmp[] = "`$k` like '{$v[1]}'";
						break;
					case 'not like':
						$tmp[] = "`$k` not like '{$v[1]}'";
						break;
					case 'in':
						$tmp[] = "`$k` in ({$v[1]})";
						break;
					case 'between':
						$tmp[] = "`$k` between {$v[1][0]} and {$v[1][1]}";
						break;
					default:
						return $this;
				}
			} else {
				$tmp[] = "`$k`='$v'";
			}
		}

		// var_dump($tmp);exit;

		$this->where = 'where '.join(' and ', $tmp);
		// echo $this->where;exit;
		return $this;
	}

	//执行原生语句
	public function execsql()
	{	
		$sql = "select * from {$this->tname}";
		if ($stmt = $this->query($sql)) {
			return $stmt->fetchAll(2);
		}
	}

	

	/**
	 * 获取最后一次执行的sql语句
	 * @return string 最后一次执行的sql语句
	 */
	public function _sql()
	{
		return $this->sql;
	}
}
