<?php
class CommentAction extends Action{
	public function display(){
		$productid=I('get.productid');
		$map['productid']=$productid;
		$res=M('comment')->where($map)->select();
		echo json_encode($res, JSON_UNESCAPED_UNICODE);	
	}
	public function insertrecord(){
		$userid=I('get.userid');
		$productid=I('get.productid');
		$comment=I('get.comment');
		$time=get_total_millisecond();
		
		$data=array(
			'userid'=>$userid,
			'productid'=>$productid,
			'comment'=>$comment,
			'commentdate'=>$time
		);
		
		$id=M('comment')->data($data)->add();
		if($id>0){
			echo 'success';
		}
	}
}
