<?php
	class ProductRequstAction extends Action{
		public function index(){
			$recommend=I('get.recommend');
			if($recommend==true){
				$product=M('product');
				$map['IsRecommend']=array('eq',true);
				$res2=$product->where($map)->order('productid desc')->select();
			}else{
				$type=I('get.type');
				$sortmethod=I('get.sortmethod');
				$keyword=M('keyword');
				$res1=$keyword->where(array('keyword'=>$type))->getField('productid',true);
				$map['productid']=array('in',$res1);
				$product=M('product');
				if($sortmethod==0){
				$res2=$product->where($map)->select();}
				else if($sortmethod==1){
					$res2=$product->where($map)->order('sales desc')->select();
				}else if($sortmethod==2){
					$res2=$product->where($map)->order('price desc')->select();
				}else if($sortmethod==3){
					$res2=$product->where($map)->order('price asc')->select();
				}else{
					$res2=$product->where($map)->order('productid desc')->select();
				}
			}
		foreach($res2 as $k=>$v){
			$res2[$k]['picture'] ='http://localhost/think/index/Images/product_'.$v['productid'].'/'.$v['picture'];
			
		}
			echo json_encode($res2, JSON_UNESCAPED_UNICODE);
		}
		
		public function search(){
			$keywords=I('get.keywords');
			$keyword=M('keyword');
			$res1=$keyword->where(array('keyword'=>$keywords))->getField('productid',true);
			if($res1==''){
			$where['productname']=array('like','%'.$keywords.'%');
			}else{
			$where['productid']=array('in',$res1);
			$where['productname']=array('like','%'.$keywords.'%');
			$where['_logic']='or';
			}
			
			$product=M('product');
			$res2=$product->where($where)->select();
			echo json_encode($res2, JSON_UNESCAPED_UNICODE); 
			
		}
		public function imgrequest(){
			$productid=I('get.id');
			//$productid=1;
			$arr=array();
			for($i=0;$i<3;$i++){
				$j=$i+1;
				$arr[$i]='http://localhost/think/index/Images/product_'.$productid.'/content_img/'.$j;
			}
			echo json_encode($arr, JSON_UNESCAPED_UNICODE);
		}
		
		public function requestbyid(){
			//$productid=I('get.id');
			$productid=1;
			$map['productid']=$productid;
			$res=M('product')->where($map)->select();
			echo json_encode($res, JSON_UNESCAPED_UNICODE); 
		}
	}