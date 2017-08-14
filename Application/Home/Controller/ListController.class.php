<?php

namespace Home\Controller;

use Think\Controller;

//购物车控制器
class ListController extends Controller 
{	 

    public function List() {

        //一级分类id
        $first_sort_id = I('get.fid');

        //二级分类id
        $second_sort_id = I('get.sid');

        $keyword = I('post.keyword');

        $numberLimit = 4;
        
        $status = 2;
        
        if ($first_sort_id){
            //实例化，获取一级分类
            $listFirst = D('List')->listFirst();

            //实例化，获取到二级分类   
            $listSecond = D('List')->listSecond();

            //输出到模板页面
            //二级分类
            $this->assign('listSecond',$listSecond);

            //一级分类
            $this->assign('listFirst',$listFirst);

        
            $field = ['id','first_sort_id','second_sort_id','goods_name','goods_status','buynum','clicknum','pic_path','store'];
            
            
            //搜索商品
            $goodsList = M('goods')->field($field)
                                            ->where("goods_status=%d and first_sort_id=%d",$status,$first_sort_id)
                                            ->page($_GET['p'].',20')
                                            ->select();

            //查询到商品的价格
            for ($i = 0; $i < count($goodsList); $i++) {

                $price = M('goods_price')->field('price,goods_id')->where(['goods_id'=>$goodsList[$i]['id']])->find();
                $goodsList[$i]['price'] = $price['price'];
                $goodsList[$i]['goods_id']; 

            }

            // 查询满足要求的总记录数
            $count = M('goods')->where("first_sort_id=%d and goods_status=%d",$first_sort_id,$status)->count();
        
             // 实例化分页类 传入总记录数和每页显示的记录数
            $Page  = new \Think\Page($count,20);

            // 分页显示输出
             $show  = $Page->show();


            //  //推荐商品 
             $recommendShop = M('goods')->field($field)->where("goods_status=%d and first_sort_id=%d",$status,$first_sort_id)->limit($numberLimit)->order('buynum desc')->select();
             
            for ($k = 0;$k < count($recommendShop);$k++) {

                $price = M('goods_price')->field('price,goods_id')->where(['goods_id'=>$recommendShop[$k]['id']])->find();

                $recommendShop[$k]['price'] =$price['price'];

                $recommendShop[$k]['goods_id'] = $price['goods_id'];

            }

            $this->assign('recommendShop',$recommendShop);

            $this->assign('show',$show);

            $this->assign('goodsList',$goodsList);
            $this->assign('session', session('homeInfo'));

            //指向的文件
            $this->display('List/list');

        } else if ($second_sort_id){

            //实例化，获取一级分类
            $listFirst = D('List')->listFirst();

            //实例化，获取到二级分类   
            $listSecond = D('List')->listSecond();

            //输出到模板页面
            //二级分类
            $this->assign('listSecond',$listSecond);

            //一级分类
            $this->assign('listFirst',$listFirst);

            $field = ['id','first_sort_id','second_sort_id','goods_name','goods_status','buynum','clicknum','pic_path','store'];
            
           
            //搜索商品
            $goodsList = M('goods')->field($field)
                                            ->where("goods_status=%d and second_sort_id=%d",$status,$second_sort_id)
                                            ->page($_GET['p'].',20')
                                            ->select();
            //查询到商品的价格
            for ($i = 0; $i < count($goodsList); $i++) {

                $price = M('goods_price')->field('price,goods_id')->where(['goods_id'=>$goodsList[$i]['id']])->find();
                $goodsList[$i]['price'] = $price['price'];
                $goodsList[$i]['goods_id'] = $price['goods_id'];

            }

            
            // 查询满足要求的总记录数
            $count = M('goods')->where("second_sort_id=%d and goods_status=%d",$second_sort_id,$status)->count();
        
             // 实例化分页类 传入总记录数和每页显示的记录数
            $Page  = new \Think\Page($count,20);

            // 拿到分页
             $show  = $Page->show();


             //  //推荐商品 
             $recommendShop = M('goods')->field($field)->where("goods_status=%d and second_sort_id=%d",$status,$second_sort_id)->limit($numberLimit)->order('buynum desc')->select();
             
            for ($k = 0;$k < count($recommendShop);$k++) {

                $price = M('goods_price')->field('price,goods_id')->where(['goods_id'=>$recommendShop[$k]['id']])->find();

                $recommendShop[$k]['price'] =$price['price'];

                $recommendShop[$k]['goods_id'] = $price['goods_id'];

            }

            $this->assign('recommendShop',$recommendShop);

            //输出分页在页面上
            $this->assign('show',$show);
            //第一次进入到商品列表的商品
            $this->assign('goodsList',$goodsList);
            $this->assign('session', session('homeInfo'));
            //指向的文件
            $this->display('List/list');

        } else if ($keyword) {
          

           $goodsListLike = D('List')->goodsLike($keyword);

           $this->assign('goodsList',$goodsListLike);

            //  //推荐商品 
             $recommendShop = M('goods')->field($field)->where("goods_status=%d",$status)->limit($numberLimit)->order('buynum desc')->select();
             
            for ($k = 0;$k < count($recommendShop);$k++) {

                $price = M('goods_price')->field('price,goods_id')->where(['goods_id'=>$recommendShop[$k]['id']])->find();

                $recommendShop[$k]['price'] =$price['price'];

                $recommendShop[$k]['goods_id'] = $price['goods_id'];

            }

            $this->assign('recommendShop',$recommendShop);



           //输出分页在页面上
            $this->assign('show',$goodsListLike[1]);
            //第一次进入到商品列表的商品
            $this->assign('goodsList',$goodsListLike[0]);
            $this->assign('session', session('homeInfo'));


           $this->display('List/list');

        }



        if ( empty($first_sort_id) && empty($second_sort_id)  && empty($keyword)) {

            //实例化，获取一级分类
            $listFirst = D('List')->listFirst();

            //实例化，获取到二级分类   
            $listSecond = D('List')->listSecond();

            //输出到模板页面 ,二级分类
            $this->assign('listSecond',$listSecond);

            //一级分类
            $this->assign('listFirst',$listFirst);

            $field = ['id','first_sort_id','second_sort_id','goods_name','goods_status','buynum','clicknum','pic_path','store'];
           
            //搜索商品
            $goodsList = M('goods')->field($field)
                                    ->where("goods_status=%d",$status)
                                    ->page($_GET['p'].',20')
                                    ->select();

            //查询到商品的价格
            for ($i = 0; $i < count($goodsList); $i++) {

                $price = M('goods_price')->field('price,goods_id')->where(['goods_id'=>$goodsList[$i]['id']])->find();
                $goodsList[$i]['price'] = $price['price'];
                $goodsList[$i]['goods_id'] = $price['goods_id'];

            }
            

            // 查询满足要求的总记录数
            $count = M('goods')->where("goods_status=%d",$status)->count();
        
             // 实例化分页类 传入总记录数和每页显示的记录数
            $Page  = new \Think\Page($count,20);

            //  //推荐商品 
             $recommendShop = M('goods')->field($field)->where("goods_status=%d",$status)->limit($numberLimit)->order('buynum desc')->select();
             
            for ($k = 0;$k < count($recommendShop);$k++) {

                $price = M('goods_price')->field('price,goods_id')->where(['goods_id'=>$recommendShop[$k]['id']])->find();

                $recommendShop[$k]['price'] =$price['price'];

                $recommendShop[$k]['goods_id'] = $price['goods_id'];

            }

            $this->assign('recommendShop',$recommendShop);

            // 分页显示输出
             $show  = $Page->show();


            $this->assign('show',$show);
            $this->assign('goodsList',$goodsList);
            $this->assign('session', session('homeInfo'));
            //指向的文件
            $this->display('List/list');

        }

    }

 
    /**
     * [listFirs1 ajax拿二级分类]
     * @return [array] [二级分类]
     * @return  [arra] [商品数据]
     */
    public function listFirs1()
    {   
        //接收ajax中POST传递过来的参数
        $id = I('post.first');

        //实例化，取得二级分类数据
       $list = D('List')->listSecond($id);

       $shopList = D('List')->goodsListSeach($id);

       $arrary = ['0'=>$list,'1'=>$shopList];

       //返回数据给前台 ajax 
        $this->ajaxreturn($arrary);  
       
    }


    /**
     * [listSecond1 ajax  点击二级分类的时候触发    拿到与一级分类 和 二级分类对应的商品]
     * @return [array] [商品列表]
     */
     public function listSecond1()
    {       

        //拿到分类id
        $id = I('post.id');

        //一级分类id
        $firstid = M('second_sort')->field('first_sort_id')->where("id=%d",$id)->select();

        //拿到一级分类的id
        $firstidend = $firstid[0]['first_sort_id'];

        // 查询商品
        $listshop = D('List')->goodsSecondListSeach($firstidend,$id);

       //返回数据给前台 ajax 
        $this->ajaxreturn($listshop);  
       
    }


}

