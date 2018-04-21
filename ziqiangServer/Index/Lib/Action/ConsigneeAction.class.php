<?php
	class ConsigneeAction extends Action{
		public function index(){
			$name=I('get.name');
			$address=I('get.address');
			$tel=I('get.tel');
			
			$data=array(
				'consigneeName'=>$name,
				'address'=>$address,
				'tel'=>$tel
			);
			
			$id=M('consignee')->data($data)->add();
			if($id>0){
				echo 'success';
			}
			
		}
		public function update(){
			$id=I('get.id');
			$name=I('get.name');
			$address=I('get.address');
			$tel=I('get.tel');
			$map['conid']=$id;
			$data=array(
				'consigneeName'=>$name,
				'address'=>$address,
				'tel'=>$tel
			);
			$id=M('consignee')->data($data)->where($map)->save();
			if($id>0){
				echo 'success';
			}
			
		}
		public function display(){
			$res=M('consignee')->select();
			echo json_encode($res, JSON_UNESCAPED_UNICODE);
		}
		public function select(){
			$conid=I('get.conid');
			$map['conid']=$conid;
			$res=M('consignee')->where($map)->select();
			echo json_encode($res, JSON_UNESCAPED_UNICODE);
		}
		public function deletes(){
			$conid=I('get.conid');
			$map['conid']=$conid;
			$res=M('consignee')->where($map)->delete();
			if($res>0){
				echo 'success';
			}
		}
	}