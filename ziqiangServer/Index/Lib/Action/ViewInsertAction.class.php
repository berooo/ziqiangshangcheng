<?php
	class ViewInsertAction extends Action{
		public function index(){
			$userid=I('get.userid');
			$productid=I('get.productid');
			$map['userid']=$userid;
			$map['productid']=$productid;
			$view=M('view');
			$res=$view->where($map)->select();
			$time=get_total_millisecond();
			$data=array(
					'userid' => $userid,
					'productid' => $productid,
					'viewdate' => $time
				);
			
			if($res==''){
				
				$id=$view->data($data)->add();
				if($id>0){
					echo 'success';
				}
			}else{
				
				$id=$view->data($data)->where($map)->save();
				if($id>0){
					echo 'update success';
				}
			} 
		}
		
		public function display(){
			$userid=I('get.userid');
			$map['userid']=$userid;
			$res1=M('view')->where($map)->order('viewdate desc')->getField('productid',true);
			
			$map['productid']=array('in',$res1);
			$product=M('product');
			$res2=$product->where($map)->select();
			foreach($res2 as $k=>$v){
			$res2[$k]['picture'] ='http://localhost/think/index/Images/product_'.$v['productid'].'/'.$v['picture'];
			
		}
			echo json_encode($res2, JSON_UNESCAPED_UNICODE);
		
		}
	}