<?php

class LoginAction extends Action{
	public function index(){
		

		//开发者使用登录凭证code获取session_key和Openid
		$APPID='wx0b239180e4090750';
		$AppSecret='a80260ff8ffe6359782c72d94a67546e';
		$code=I('get.code');
	//	$code='001eLAH82yy5MP0uLIJ82zORH82eLAH2';
		$url="https://api.weixin.qq.com/sns/jscode2session?appid=".$APPID."&secret=".$AppSecret."&js_code=".$code."&grant_type=authorization_code";
		$arr=vget($url);
	//	echo $arr;
		$arr=json_decode($arr,true);
		$openid=$arr['openid'];
	//	echo 'openid:'.$openid;
		$session_key=$arr['session_key'];
	//	echo 'session_key:'.$session_key;
		//生成第三方3rd_session
		$session3rd=null;
		$strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
		$max=strlen($strPol)-1;
		for($i=0;$i<16;$i++){
			$session3rd.=$strPol[rand(0,$max)];
		}
		
		session($session3rd,$session_key.$openid);
		echo $session3rd;
	}
	
	public function insertUserInfo(){
		 $username=I('get.username');
		$tel=I('get.tel'); 
		$data=array(
			'username'=>$username,
			'usertel' =>$tel,
			'password'=>'12345678'
		);
		$id=M('user')->data($data)->add();
		echo $id;
	}
	public function checkExist(){
		//$username=I('get.name');
		$username='萌萌哒';
		
	}
	public function setPassword(){
		 $userid=I('get.userid');
		$oldpassword=I('get.oldpassword');
		$newpassword=I('get.newpassword'); 
		
		$model=M('user');
		$res1=$model->where(array('userid'=>$userid,'oldpassword'=>$oldpassword))->getField('password');
		
		if($oldpassword == $res1){
			$data=array('password'=>$newpassword);
			$model->data($data)->where(array('userid'=>$userid,'oldpassword'=>$oldpassword))->save();
			echo 'success';
		}else{ 
			echo 'error';
		}
	}
}