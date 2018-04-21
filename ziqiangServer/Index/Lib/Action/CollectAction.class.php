<?php
	class CollectAction extends Action{
		public function index(){
			$userid=I('get.userid');
			$productid=I('get.productid');
			$data=array(
			'userid'=>$userid,
			'productid' =>$productid
		);
			$id=M('collection')->data($data)->add();
			if($id>0){
				echo 'success';
			}else{
				echo 'fail';
			}
		}
		public function remove(){
			$userid=I('get.userid');
			$productid=I('get.productid');
		    $map['userid']=$userid;
			$map['productid']=$productid;
			$result=M('collection')->where($map)->delete();
			if($result>0){
				echo 'success';
			}else{
				echo 'fail';
			}
		}
		public function display(){
			$userid=I('get.userid');
			$map['userid']=$userid;
			$res1=M('collection')->where($map)->getField('productid',true);
			$map['productid']=array('in',$res1);
			$product=M('product');
			$res2=$product->where($map)->select();
			foreach($res2 as $k=>$v){
			$res2[$k]['picture'] ='http://localhost/think/index/Images/product_'.$v['productid'].'/'.$v['picture'];
			
		}
			echo json_encode($res2, JSON_UNESCAPED_UNICODE);
		}
	}
?>