<?php
namespace Home\Controller;
use Think\Controller;
class CenterController extends Controller {
	/**
	 * 注释
	 * @param 参数1
	 * @param 参数2
	 * @return 返回类型
	 */
	/**
	 * 个人中心页面加载
	 */
	public function Center(){
		$this->display();
	}
	public function PersonalInfo(){
        $this->display();
    }
    public function MyPublish(){
	    $this->display();
    }
    public function UnderSale(){
        $this->display();
    }
    public function MySale(){
        $this->display();
    }
    public function MyBuy(){
        $this->display();
    }
    public function MyZan(){
        $this->display();
    }
    public function MyAuction(){
        $this->display();
    }
    public function MyMoney(){
        $this->display();
    }
    public function MyAddr(){
        $this->display();
    }
    public function AddAddr(){
        $this->display();
    }
    public function EditAddr(){
        $this->display();
    }
    /**
     * 个人中心页面加载
     */
    public function info(){
        $ary = array();
        $db = M('huser');
        $h_id = cookie('user');
        $res = $db->where("h_id='{$h_id}'")->select();
        //我的信息
        array_push($ary,$res);
        $db2 = M('ngoods');
        $res2 = $db2->where("h_id='{$h_id}' AND n_status =1")->select();
        $res7 = $db2->where("h_id='{$h_id}'")->select();
        //我发布的
        array_push($ary,$res2);
        $db3 = M('order');
        $res3 = $db3->where("h_id='{$h_id}'")->select();
        //我买到的
        array_push($ary,$res3);
        $res4 = $db3->where("h_id_m='{$h_id}'")->select();
        //我卖出的
        array_push($ary,$res4);
        $db4 = M('praise');
        $res5 = $db4->where("h_id = '{$h_id}'")->select();
        //我赞过的
        array_push($ary,$res5);
        //被赞过的
        $str = '';
        for($i=0;$i<count($res7);$i++){
            if($i==count($res7)-1){
                $str=$str.$res7[$i]['n_id'];
            }else{
                $str=$str.$res7[$i]['n_id'].',';
            }

        }
        $res6 = $db4->where("n_id in({$str})")->select();
        array_push($ary,$res6);
        echo json_encode($ary);
    }
    /**
     * 修改登录密码
     */
    public function ModifyPwd(){
        $pwd1 = md5(I('pwd1'));
        $pwd2 = md5(I('pwd2'));
        $h_id = cookie('user');
        $db = M('huser');
        $res = $db->where("h_pwd = '{$pwd1}'")->select();
        if($res){
            $ary['h_pwd'] = $pwd2;
            $res2 = $db->where("h_id = '{$h_id}'")->save($ary);
            if ($res2){
                echo 1;
            }
        }else{
            echo 2;
        }
    }
    /**
     * 修改支付密码
     */
    public function ModifyPwd2(){
        $pwd1 = md5(I('pwd1'));
        $pwd2 = md5(I('pwd2'));
        $h_id = cookie('user');
        $db = M('huser');
        $res = $db->where("h_paypwd = '{$pwd1}'")->select();
        if($res){
            $ary['h_paypwd'] = $pwd2;
            $res2 = $db->where("h_id = '{$h_id}'")->save($ary);
            if ($res2){
                echo 1;
            }
        }else{
            echo 2;
        }
    }
    /**
     * 加载用户信息
     */
    public function user(){
        $db = M('huser');
        $h_id = cookie('user');
        $res = $db->where("h_id='{$h_id}'")->select();
        echo json_encode($res);
    }
    /**
     * 更新用户信息
     */
    public function saveUser(){
        $db = M('huser');
        $h_id = cookie('user');
        $ary['h_sex'] = I('sex');
        $ary['h_tel'] = I('tel');
        $ary['h_email'] = I('email');
        $res = $db->where("h_id='{$h_id}'")->save($ary);
    }
    /**
     * 加载我发布的商品
     */
    public function RelGoods(){
        $ary = array();
        $db = M('ngoods');
        $h_id = cookie('user');
        $res = $db->where("h_id = '{$h_id}'")->select();
        array_push($ary,$res);
        $str = '';
        for($i=0;$i<count($res);$i++){
            if($i==count($res)-1){
                $str=$str.$res[$i]['n_id'];
            }else{
                $str=$str.$res[$i]['n_id'].',';
            }
        }
        $db2 = M('images');
        $res2 = $db2->where("n_id in({$str})")->select();
        array_push($ary,$res2);
        echo json_encode($ary);
    }
    /**
     * 发布商品下架
     */
    public function shelves(){
        $db = M('ngoods');
        $n_id = I('n_id');
        $ary['n_status'] = 0;
        $res = $db->where("n_id = '{$n_id}'")->save($ary);
    }

    /**
     * 发布商品上架
     */
    public function shelves2(){
        $db = M('ngoods');
        $n_id = I('n_id');
        $ary['n_status'] = 1;
        $res = $db->where("n_id = '{$n_id}'")->save($ary);
    }

    /**
     * 我卖出的商品
     */
    public function sale(){
        $db = M('ngoods');
        $db2 = M('order');
        $db3 = M('images');
        $h_id = cookie('user');
        $ary = array();
        $res = $db2->where("h_id_m = '{$h_id}'")->select();
        $str = '';
        for($i=0;$i<count($res);$i++){
            if($i==count($res)-1){
                $str=$str.$res[$i]['n_id'];
            }else{
                $str=$str.$res[$i]['n_id'].',';
            }
        }
        $res2 = $db->where("n_id in({$str})")->select();
        $res3 = $db3->where("n_id in({$str})")->select();
        array_push($ary,$res2);
        array_push($ary,$res3);
        array_push($ary,$res);
        echo json_encode($ary);
    }


    /**
     * 我买到的商品
     */
    public function buy(){
        $db = M('ngoods');
        $db2 = M('order');
        $db3 = M('images');
        $h_id = cookie('user');
        $ary = array();
        $res = $db2->where("h_id = '{$h_id}'")->select();
        $str = '';
        for($i=0;$i<count($res);$i++){
            if($i==count($res)-1){
                $str=$str.$res[$i]['n_id'];
            }else{
                $str=$str.$res[$i]['n_id'].',';
            }
        }
        $res2 = $db->where("n_id in({$str})")->select();
        $res3 = $db3->where("n_id in({$str})")->select();
        array_push($ary,$res2);
        array_push($ary,$res3);
        array_push($ary,$res);
        echo json_encode($ary);
    }
    /**
     * 删除我卖出的订单
     */
    public function delOrder(){
        $db = M('order');
        $n_id = I('id');
        $h_id = cookie('user');
        $res = $db->where("h_id_m = '{$h_id}' AND n_id = '{$n_id}'")->delete();
    }
    /**
     * 删除我买到出的订单
     */
    public function delOrder2(){
        $db = M('order');
        $n_id = I('id');
        $h_id = cookie('user');
        $res = $db->where("h_id = '{$h_id}' AND n_id = '{$n_id}'")->delete();
    }
    /**
     * 我买到的商品
     */
    public function showAddr(){
        $db = M('address');
        $h_id = cookie('user');
        $res = $db->where("h_id= '1'")->order('d_status desc')->select();
        echo json_encode($res);
    }
    public function addrAdd(){
        $db = M('address');
        $h_id = cookie('user');
        $city=I('post.city');
        $detail=I('post.detail');
        $arr1=array($city,$detail);
        $arr2=implode(",",$arr1);
        $data = array('h_id' => 1,'d_address' =>$arr2, 'd_name' =>I('post.name'), 'd_tel' =>I('post.tel'));
        $res=$db->data($data)->add();
        if($res){
            echo 1;
        }
        else{
            echo 2;
        }
    }
}