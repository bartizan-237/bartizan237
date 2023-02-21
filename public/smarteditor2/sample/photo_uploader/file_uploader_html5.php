<?php
 	$sFileInfo = '';
	$headers = array();

	foreach($_SERVER as $k => $v) {
		if(substr($k, 0, 9) == "HTTP_FILE") {
			$k = substr(strtolower($k), 5);
			$headers[$k] = $v;
		}
	}

	$filename = rawurldecode($headers['file_name']);
	$filename_ext = strtolower(array_pop(explode('.',$filename)));
	$allow_file = array("jpg", "png", "bmp", "gif");

	if(!in_array($filename_ext, $allow_file)) {
		echo "NOTALLOW_".$filename;
	} else {
		$file = new stdClass;
		$file->name = date("YmdHis")."_".rand(0, 100).".".$filename_ext;
		$file->content = file_get_contents("php://input");


        /** Laravel Server로 Image 전송 -> Cafe24 API로 .cafe24.com 서버에 이미지 업로드 -> 이미지 URL 리턴받아서 사용 **/
        $data = array(
            'image' => base64_encode(file_get_contents("php://input"))
        );

         $url = "https://immanuel237.com/file_upload";
//        $url = $_SERVER['HTTP_HOST'] . "/file_uploader";

        $ch = curl_init();                                 //curl 초기화
        curl_setopt($ch, CURLOPT_URL, $url);               //URL 지정하기
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    //요청 결과를 문자열로 반환
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);      //connection timeout 10초
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);   //원격 서버의 인증서가 유효한지 검사 안함
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));       //POST data
        curl_setopt($ch, CURLOPT_POST, true);              //true시 post 전송

        $image_url_in_cafe24 = curl_exec($ch);
        curl_close($ch);


		$uploadDir = '../../upload/';
		if(!is_dir($uploadDir)){
			mkdir($uploadDir, 0777);
		}

		$newPath = $uploadDir.$file->name;

		if(file_put_contents($newPath, $file->content)) {
			$sFileInfo .= "&bNewLine=true";
			$sFileInfo .= "&sFileName=".$filename;
			// $sFileInfo .= "&sFileURL=upload/".$file->name;
            $sFileInfo .= "&sFileURL=".$image_url_in_cafe24;
		}
		echo $sFileInfo;
	}
?>
