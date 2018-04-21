<?php
	class OrderAction extends Action{
		public function index(){
			$productsarr=I('get.products');
			$product=trimall($productsarr);
			$products=json_decode($product,true);
			
			
			$userid=I('get.userid');
			$conid=I('get.conid');
			$price=I('get.price'); 
			$time=get_total_millisecond();
			
			$data=array(
				'userid'=>$userid,
				'conid'=>$conid,
				'orderdate'=>$time,
				'totalprice'=>$price,
				'ispaid'=>false,
				'isshipped'=>false,
				'isreceived'=>false,
				'iscomment'=>false

				);
			
			$id=M('order')->data($data)->add();
			
			
			 foreach($products as $val){
				$data=array(
					'productid'=>$val['productid'],
					'orderid'=>$id,
					'number'=>$val['num']
				);
				M('orderitem')->data($data)->add();
			} 
			

			echo 'success';
		}
		
		public function display(){
			$userid=I('get.userid');
			$method=I('get.method');
			if($method==1){
			$m=M('order');
			$map['ispaid']=false;
			$map['userid']=$userid;
			$res=$m->where($map)->select();
			echo json_encode($res, JSON_UNESCAPED_UNICODE);
			}else if($method==2){
			$m=M('order');
			$map['ispaid']=true;
			$map['isshipped']=false;
			$map['userid']=$userid;
			$res=$m->where($map)->select();
			echo json_encode($res, JSON_UNESCAPED_UNICODE);
			}else if($method==3){
			
			$m=M('order');
			$map['ispaid']=true;
			$map['isshipped']=true;
			$map['isreceived']=false;
			$map['userid']=$userid;
			$res=$m->where($map)->select();
			echo json_encode($res, JSON_UNESCAPED_UNICODE);
			}else if($method==4){
			$m=M('order');
			$map['ispaid']=true;
			$map['isshipped']=true;
			$map['isreceived']=true;
			$map['iscomment']=false;
			$map['userid']=$userid;
			$res=$m->where($map)->select();
			echo json_encode($res, JSON_UNESCAPED_UNICODE);
			}else{
			$m=M('order');
			$map['ispaid']=false;
			$map['userid']=$userid;
			$res=$m->where($map)->select();
			echo json_encode($res, JSON_UNESCAPED_UNICODE);
			}
		}
		
		public function products(){
			$orderid=I('get.orderid');
			$map['orderid']=$orderid;
			$res1=M('orderitem')->where($map)->getField('productid',true);
			$map['productid']=array('in',$res1);
			$res2=M('product')->where($map)->select();
			
			$sql='select productid,number from hd_orderitem where orderid='.$orderid;
			$res3=M('orderitem')->query($sql);
			
			foreach($res2 as $k=>$v){
					
				$res2[$k]['num']=$res3[$k]['number'];
		}
			foreach($res2 as $k=>$v){
			$res2[$k]['picture'] ='http://localhost/think/index/Images/product_'.$v['productid'].'/'.$v['picture'];
			
		}
			echo json_encode($res2, JSON_UNESCAPED_UNICODE);	
		}
		public function deletes(){
			$orderid=I('get.orderid');
			$map['orderid']=$orderid;
			$res1=M('order')->where($map)->delete();
			$res2=M('orderitem')->where($map)->delete();
			if(($res1>0)&&($res2>0)){
				echo 'success';
			}
		}
	}