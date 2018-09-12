<?php
if (! class_exists('Blogger')) {
    class Blogger
    {
		private $accessToken;
		function __construct(){
			$this->accessToken = $this->getAccessToken();
        }

        public function create($title)
        {
			/**create post and get url **/
			$url = $this->createBlankPost($title);
        }
		
		public function update($post){
			
		}
		
		/* Call private functions  */
		private function createBlankPost($url){
			$slug = $this->getSlug($url);
			$data = array (
					"kind" => "blogger#post",
					"blog" => array ("id" => $config->get('B-BLOGID')),
					"title" => $slug,
					"content" => ''
			);
			$response = runForBlogger ( $config->get('B-APICREATE'), $data, $token );
			$postId = (isset ( $response ['id'] )) ? $response ['id'] : false;
			$response ['url'];	
        }
		
		private function updatePost($post){
			
			$updatePosturl = $config->get('B-APICREATE') . $postId;
			$data ['id'] = $postId;
			$data ['title'] = $video ['title'];
			$response = runForBlogger ( $updatePosturl, $data, $token, "PUT" );
			return (isset ( $response ['id'] )) ? $response ['id'] : false;		
		}
		
		
		private function getSlug($text){
		  $text = preg_replace('~[^\pL\d]+~u', '-', $text);
		  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
		  $text = preg_replace('~[^-\w]+~', '', $text);
		  $text = trim($text, '-');
		  $text = preg_replace('~-+~', '-', $text);
		  $text = strtolower($text);
		  return (empty($text))? false : $text;
		}
		
		private function getAccessToken(){
			//$app
		}
    }
}