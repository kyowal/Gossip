<?php
if (! class_exists('Image')) {

    class Image
    {

        private $service;

        function __construct()
        {
            $this->service = 'imgur';
        }

        public function getImageUrl($image, $isUrl = TRUE)
        {
            $imageUrl = false;
            if ($isUrl == TRUE) {
                // get Image content and then retrive url
            }elseif ($isUrl == FALSE) {
                return $this->prepairImageForUpload($image);
            }
            return $imageUrl;
        }

        /* Private functions written for working only in class */
        private function prepairImageForUpload($imageFile)
        {
            $result = false;
			$imgData = $this->validateImage($imageFile);
			if($imgData == TRUE){
				switch ($this->service) {
					case 'imgur':
						$result = $this->imgurImage(file_get_contents($imageFile['tmp_name']));
					break;
				}
			}else{
				$result = $imgData;
			}
            return $result;
        }

		private function validateImage($imageFile){
			$extensions = array( "png", "jpg", "jpeg", "gif" );
			$info = @getimagesize($imageFile["tmp_name"]);
			$image = array();
			$image['width']  	= (isset($info[0]))?$info[0] : 0;
			$image['height'] 	= (isset($info[1]))?$info[1] : 0;
			$image['extension'] = pathinfo($imageFile["name"], PATHINFO_EXTENSION);
			if (!file_exists($imageFile["tmp_name"])){
				return array("status" => 'fail', "msg" => "Invalid image, So i am unable to upload" );
			}else if (! in_array($image['extension'], $extensions)){
				return array("status" => 'fail', "msg" => "This type of image not allowed to upload");		
			}else if ($imageFile["size"] > 3145728){
				return array("status" => 'fail', "msg" => "You can upload maximum 3 MB Size image");
			}else if ($image['width'] < "250" || $image['height'] < "150"){
				return array("status" => 'fail', "msg" => "This image is too small use medium size image. Like 720*420");
			}
			return TRUE;
		}
		
        private function imgurImage($image)
        {
            include_once ('class_site_imgur.php');
            $imgur = new Imgur();
            $options = $imgur->getData($image);
            $imgContent = json_decode($this->runCurl($options));
            if($imgContent->success == TRUE){
				return (isset($imgContent->data->link))? array("status" => 'success', "url" => $imgContent->data->link) : array("status" => 'fail', "msg" => "Unable to handle image");
			}
			return array("status" => 'fail', "msg" => "Unable to handle image");
        }

        private function runCurl($options)
        {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $options['APIURL'],
                CURLOPT_TIMEOUT => 30,
                CURLOPT_POST => 1,
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_HTTPHEADER => $options['HTTPHEADER'],
                CURLOPT_POSTFIELDS => $options['POSTFIELDS'],
                CURLOPT_SSL_VERIFYPEER => false
            ));
            $result = curl_exec($curl);
            if (curl_error($curl)) {
                echo curl_error($curl);
            }
            curl_close($curl);
            return $result;
        }
    }
}