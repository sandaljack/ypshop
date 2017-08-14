<?php
    
    namespace Home\Model;

    use Think\Model;

    class  ListModel extends Model
    {
        //解决D方法直接查数据库，虚拟模型的问题
         protected $autoCheckFields = false;

         /**
          * [listSecond 二级分类]
          * @param  [integer] $first_sort_id [一级分类]
          * @return [array]      $listSecond  [返回二级分类]
          */
        public function  listSecond($first_sort_id) 
        {


            if ($first_sort_id){

                $id = ['first_sort_id'=>$first_sort_id];

                $listSecond = M('second_sort')->field('name,id,first_sort_id')->where($id)->select();

            }else {

                 $listSecond = M('second_sort')->field('name,id,first_sort_id')->where()->select();
            }

          
            return $listSecond;
        }



        /**
         * [listFirst 一级分类]
         * @param  [integer] $first_sort_id [一级分类]
         * @return [array] $listFirst [一级分类名]
         */
        public function listFirst($first_sort_id)
        {

            if ($first_sort_id) {

                 $id = ['id'=>$first_sort_id];

                 $listFirst =M('first_sort')->field('name,id')->where($id)->select();


            } else {


                 $listFirst =M('first_sort')->field('name,id')->where()->select();
            }


            return $listFirst;
        }



        



        /**
         * [goodsListSeach 获取到对应的二级分类]
         * @param  [int] $first_sort_id [一级分类]
         * @return [array]    $seach  [返回二级分类]
         */
        public function goodsListSeach($first_sort_id) {
            
            $status = 2;
            $fields = ['id','first_sort_id','second_sort_id','goods_name','goods_status','buynum','clicknum','pic_path','store'];

            $seach = M('goods')->field($fields)->where("first_sort_id=%d and goods_status=%d",$first_sort_id,$status)->select();

            //查询到商品的价格
            for ($i = 0; $i < count($seach); $i++) {

                $price = M('goods_price')->field('price,goods_id')->where(['goods_id'=>$seach[$i]['id']])->find();
                $seach[$i]['price'] = $price['price'];
                $seach[$i]['goods_id']; 

            }


            return $seach;  


        }



        /**
         * [goodsSecondListSeach ajax 二级分类搜索到的商品]
         * @param  [int] $firstid        [一级分类的id]
         * @param  [int] $second_sort_id [二级分类的id]
         * @return [array]    seach      [商品列表]
         */
        public function goodsSecondListSeach($firstid,$second_sort_id) {
            
            $status = 2;
            $fields = ['id','first_sort_id','second_sort_id','goods_name','goods_status','buynum','clicknum','pic_path','store'];


            $seach = M('goods')->field($fields)->where("first_sort_id=%d and second_sort_id=%s and goods_status=%d",$firstid,$second_sort_id,$status)->select();

            //查询到商品的价格
            for ($i = 0; $i < count($seach); $i++) {

                $price = M('goods_price')->field('price,goods_id')->where(['goods_id'=>$seach[$i]['id']])->find();
                $seach[$i]['price'] = $price['price'];
                $seach[$i]['goods_id']; 

            }

            return $seach;  


        }


        /**
         * [goodsLike 模糊搜索]
         * @param  [string] $like [模糊搜索]
         * @return [type]    $dataLikeList  [模糊搜索的 $dataLikeList[0] 商品数据 与分页 $dataLikeList[1]]
         */
        public function goodsLike($like)
        {   

            //搜索条件
            $like = '%'.$like.'%';

            //模糊搜索条件
            $where['goods_name'] = array('like',$like);

            //商品的状态
            $status = 2;
            
            //拿到商品
            $goodsList = M('goods')->field('id,pic_path,goods_name,buynum')
                                   ->where($where)
                                   ->page($_GET['p'].',10')
                                   ->select();

              //拿到每个商品的价格                     
            for ($i = 0; $i < count($goodsList); $i++) {

                $price = M('goods_price')->field('price,goods_id')->where(['goods_id'=>$goodsList[$i]['id'],'goods_status'=>$status])->order('price')->find();

                $goodsList[$i]['price'] = $price['price'];

                $goodsList[$i]['goods_id'];

            }

           
            // 查询满足要求的总记录数
            $count = M('goods')->where($where)->count();
            
            // 实例化分页类 传入总记录数和每页显示的记录数
            $Page  = new \Think\Page($count,10);

            // 分页显示输出
            $show  = $Page->show();


            $dataLikeList = [$goodsList,$show];

            return $dataLikeList;

        }




    }