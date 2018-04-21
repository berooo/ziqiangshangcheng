<?php

    class PhoneCheckAction extends Action{
		public function index(){
			echo '...';
			/* $time = get_total_millisecond();
			$appId = 'wd4688711392xofoqq';
			$mobile = I('get.mobile');
			$templateId = 100000;
			$sign_key = 'jfDuCmIDSCvJCYO7KYbYuVgQuVaaz6axSFwvXrHR';
			$sign_data = array('mobile' => $mobile, 'templateId' => $templateId, 'timestamp' => $time);
			// 以字母升序(A-Z)排列
			ksort($sign_data);
			var_dump($sign_data);
			$sign_str = http_build_query($sign_data) . '&' . $sign_key;
			//DEBUG
			//生成数字签名的方法 https://docs.wilddog.com/sms/guide/signature.html#生成数字签名的方法
			$signature = hash("sha256", urldecode($sign_str));
			$url = "https://api.wilddog.com/sms/v1/${appId}/code/send";
			// 不同接口参数不同， 详细参数请参见 https://docs.wilddog.com
			$post_data = array('signature' => $signature, "mobile" => $mobile, "timestamp" => $time, "templateId" => $templateId);
			$form_string = http_build_query($post_data);
			// DEBUG
			//echo "打印sign_str\n";
			//var_dump($sign_str);
			//echo "打印signature\n";
			//var_dump($signature);
			//echo "打印发送的数据\n";
			//var_dump($form_string);
			$header = array(
				'Content-Type: application/x-www-form-urlencoded',
			);
			$ch = curl_init();
			// DEBUG 打印curl请求和响应调试日志
			curl_setopt($ch, CURLOPT_VERBOSE, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			// post数据
			curl_setopt($ch, CURLOPT_POST, 1);
			// post的变量
			curl_setopt($ch, CURLOPT_POSTFIELDS, $form_string);
			$output = curl_exec($ch);
			curl_close($ch);
			// DEBUG
			//echo "打印获得的数据\n";
			var_dump($output); */
				}
	public function check(){
		$mobile = I('get.mobile');
			$model=M('user');
			$id=$model->where(array('usertel'=>$mobile))->getField('userid');
			if($id>0){
				echo 'registed';
			}else{echo 'check';}
			
		
			/*  $time = get_total_millisecond();
			 $appId = 'wd4688711392xofoqq';
		//	$code = I('get.code');
		$code='261659';
		//	$mobile = I('get.mobile');
		$mobile='13016458405';
			$sign_key = 'jfDuCmIDSCvJCYO7KYbYuVgQuVaaz6axSFwvXrHR';
			$sign_data = array('mobile' => $mobile, 'code' => $code, 'timestamp' => $time);
			// 以字母升序(A-Z)排列
			ksort($sign_data);
			//var_dump($sign_data);
			$sign_str = http_build_query($sign_data) . '&' . $sign_key;
			//DEBUG
			//生成数字签名的方法 https://docs.wilddog.com/sms/guide/signature.html#生成数字签名的方法
			$signature = hash("sha256", urldecode($sign_str));
			$url = "https://api.wilddog.com/sms/v1/${appId}/code/check";
			// 不同接口参数不同， 详细参数请参见 https://docs.wilddog.com
			$post_data = array('signature' => $signature, "mobile" => $mobile, "timestamp" => $time, "code" => $code);
			$form_string = http_build_query($post_data);
			// DEBUG
			//echo "打印sign_str\n";
			//var_dump($sign_str);
			//echo "打印signature\n";
			//var_dump($signature);
			//echo "打印发送的数据\n";
			//var_dump($form_string);
			$header = array(
				'Content-Type: application/x-www-form-urlencoded',
			);
			$ch = curl_init();
			// DEBUG 打印curl请求和响应调试日志
			curl_setopt($ch, CURLOPT_VERBOSE, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			// post数据
			curl_setopt($ch, CURLOPT_POST, 1);
			// post的变量
			curl_setopt($ch, CURLOPT_POSTFIELDS, $form_string);
			$output = curl_exec($ch);
			curl_close($ch);
			// DEBUG
			//echo "打印获得的数据\n";
			var_dump($output); */
				
	}
	}