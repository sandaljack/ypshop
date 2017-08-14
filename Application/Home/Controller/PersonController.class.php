<?php

namespace Home\Controller;

use Think\Controller;

class PersonController extends CommonController
{

    //显示个人中心页面
    public function person()
    {
        $this->assign('session', session('homeInfo'));
        $flink = M('friendlink')->select();
            $this->assign('link', $flink);
    	   
        $this->display();
    }

     /**
     * 处理显示个人中心信息
     * @return [type] [description]
     */
    public function infor()
    {

        //获取session里的用户信息uid
        $id = session('homeInfo')['id'];

        //凭uid查user / user_detail表 查询用户信息
        $model = M('user a');
        $data = $model
        ->field('username,userpic,email,sex,address,birthday,birthmonth,birthyear,phone')
        ->join( 'left join yp_user_detail b on a.id = b.user_id' )->where(['a.id'=>$id])->find();


        //把数据发送到前台模板 --> 遍历
        $this->assign('list',$data);
        $this->assign('session', session('homeInfo'));
        $flink = M('friendlink')->select();
        $this->assign('link', $flink);

        //加载模板
        $this->display();
    }


    /**
     * 个人中心验证
     * @return [type] [description]
     */
    public function vfInfo()
    {

        //接收用户数据
        $name = I('post.name');
        $val  = I('post.val');
        
        //匹配输入框
        switch ($name) {

            //验证昵称
            case 'user':

                $res = preg_match('/^\w{4,20}$/', $val);

                if ($res) {
                    echo 2;
                } else {
                    echo 1;
                }
            break;

            //验证手机号
            case 'phone':

                $res = preg_match('/^\d{11}$/', $val);

                if ($res) {
                    echo 4;
                } else {
                    echo 3;
                }
            break;

            //验证邮箱
            case 'email':

                $res = preg_match('/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/', $val);

                if ($res) {
                    echo 6;
                } else {
                    echo 5;
                }
            break;
        }

    }

    /**
     * 处理个人中心信息修改
     * @return [type] [description]
     */
    public function doInfo()
    {

        //接收用户填写数据
       
        $addr = I('post.addr');
        $phone = I('post.phone');
        $email = I('post.email');
        $sex   = I('post.sex');
        $birthday = I('post.birthday');
        $birthmonth = I('post.birthmonth');
        $birthyear  = I('post.birthyear');


        //判断内容是否为空
        if ( empty($addr) || empty($phone) || empty($email) ) {

            $this->error('内容不能为空！', U('infor'));
        }

       
        //判断电话号码格式
        if ( !preg_match('/^\d{11}$/', $phone) ) {

            $this->error('电话格式不正确！', U('infor'));
        }

        //判断邮箱格式
        if ( !preg_match('/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/', $email) ) {

            $this->error('邮箱格式不正确！', U('infor'));
        }

        
        //获取用户ID
        $uid  = session('homeInfo')['id'];

        //查询detail表
        $exist = M('user_detail')->where(['user_id'=>$uid])->find();


        //判断用户是否设置过个人信息
        if ($exist) {

            //修改用户表
            $arr1 = ['username'=>$user,'phone'=>$phone,'email'=>$email];
            $bool1 = M('user')->where(['id'=>$uid])->save($arr1);

            //修改用户详情表
            $arr2 = ['sex'=>$sex,'address'=>$addr,'birthday'=>$birthday,'birthmonth'=>$birthmonth,'birthyear'=>$birthyear];
            $bool2 = M('user_detail')->where(['user_id'=>$uid])->save($arr2);

            //判断是否修改成功
            if ( $bool1 || $bool2 ) {
                //修改成功
                $this->success('修改成功！');
            } else {
                //修改失败
                $this->error('修改失败！');
            }

        } else {

            //修改用户表
            $arr1 = ['username'=>$user,'phone'=>$phone,'email'=>$email];

            $bool1 = M('user')->where(['id'=>$uid])->save($arr1);

            //插入用户详情表
            $arr2 = ['sex'=>$sex,'address'=>$addr,'birthday'=>$birthday,'birthmonth'=>$birthmonth,'birthyear'=>$birthyear,'user_id'=>$uid];

            $bool2 = M('user_detail')->add($arr2);

            //判断是否修改成功
            if ( $bool1 || $bool2 ) {
                //修改成功
                $this->success('修改成功！');
            } else {
                //修改失败
                $this->error('修改失败！');
            }

        }
        

    }

    /**
     * 处理个人中心头像修改
     * @return [type] [description]
     */
    public function doUpload()
    {

        //调用MODEL层文件上传类
        $obj = D('Uploads');

        //执行文件上传
        $method = $obj->uploads();

        //拼接头像图片的完整路径
        $filename = $method['info']['pic']['savepath'].$method['info']['pic']['savename'];

        //获取SESSION中的用户ID
        $id = session('homeInfo')['id'];

        //修改数据库
        $res = M('user')->where(['id'=>$id])->save(['userpic'=>$filename]);
        
        //判断文件名不为空并且修改数据库成功
        if ($res && $filename) {
            //修改成功
            $this->success('修改成功！');
        } else {
            //修改失败
            $this->error('修改失败！');
        }
    }
    
    //修改密码页面
    public function password()
    {
        $this->assign('session', session('homeInfo'));
        $flink = M('friendlink')->select();
        $this->assign('link', $flink);
        $this->display();
    }
    

    //个人中心修改密码
    public function changePass()
    {
        //获取用户ID
        $uid = session('homeInfo')['id'];

        //获取用户输入的旧密码
        $oldpass = I('post.oldpass');

        //查询用户表
        $res = M('user')->where(['id'=>$uid])->find();

        //验证密码是否正确
        $msg = password_verify( $oldpass, $res['password']);

        if ($msg) {

            //获取新密码
            $newpass = I('post.newpass');
            //获取重复密码
            $repass = I('post.repass');

            if ($newpass != $repass) {
                $this->error('两次密码不一致！');
                exit;
            }

            //加密新密码
            $pass = password_hash($newpass, PASSWORD_DEFAULT);

            //修改密码
            $msg = M('user')->where(['id'=>$uid])->save(['password'=>$pass]);

            if ($msg) {

                $this->success('修改成功！');
                exit;
            } else {

                $this->error('修改失败！');
                exit;
            }

        } else {

            $this->error('密码不正确！');
        }
    }
    
    
    

   


    //收藏
    public function collection()
    {


         //用户的ID
        $user =  session('homeInfo.id');

        
        $status = 2;
        $goodid = I('post.goodid');

        //分页的count的条件
        $where['user_id'] = $user;

        //接收删除收藏的id
        $deteteCId = I('post.delete');

        //删除数据条件
        $deleteDataWhere = ['user_id'=>$user,'good_id'=>$goodid];

        //判断是第一次进入，还是删除收藏商品
        if ( $deteteCId ){

             $bool = M('collect')->where($deleteDataWhere)->delete();

             if ($bool){

               // 查询满足要求的总记录数
                $count = M('collect')->where($where)->count();
                
                // 实例化分页类 传入总记录数和每页显示的记录数
                $Page  = new \Think\Page($count,10);

                // 分页显示输出
                $show  = $Page->show();

                //得到分页 + 数据
                $collectGood = M('collect c')->field('c.good_id,g.id,g.first_sort_id,g.second_sort_id,g.goods_name,g.goods_status,g.pic_path,g.buynum,p.price')
                                           ->join('yp_goods g on c.good_id = g.id')
                                           ->join('yp_goods_price p on p.goods_id = c.good_id')
                                           ->where("c.user_id=%d and g.goods_status=%d",$user,$status)
                                           ->limit($Page->firstRow.','.$Page->listRows)
                                           ->select();

                //这个值用来算价格的 原价
                $number = 1.2;

                $array = array('0'=>$number,'1'=>$collectGood,'2'=>$show);
                
                $this->ajaxreturn($array);  

             } else {

                $data = 0;




                $this->ajaxreturn($data);  
             }
             $this->ajaxreturn($bool);  

        } else {

           
            // 查询满足要求的总记录数
            $count = M('collect')->where($where)->count();
            
            // 实例化分页类 传入总记录数和每页显示的记录数
            $Page  = new \Think\Page($count,10);

            // 分页显示输出
            $show  = $Page->show();

            //得到分页 + 数据
            $collectGood = M('collect c')->field('c.good_id,g.id,g.first_sort_id,g.second_sort_id,g.goods_name,g.goods_status,g.pic_path,g.buynum,p.price')
                                       ->join('yp_goods g on c.good_id = g.id')
                                       ->join('yp_goods_price p on p.goods_id = c.good_id')
                                       ->where("c.user_id=%d and g.goods_status=%d",$user,$status)
                                       ->limit($Page->firstRow.','.$Page->listRows)
                                       ->select();

            $this->assign('show',$show);

            //这个值用来算价格的 原价
            $number = 1.2;

            $this->assign('session', session('homeInfo'));

            $this->assign('number',$number);

            $this->assign('collectGood',$collectGood);
            $flink = M('friendlink')->select();
            $this->assign('link', $flink);

            $this->display('Person/collection');


        }




    }
}