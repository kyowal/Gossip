<?php
session_start();
include ('config.php');
include ('class_database.php');
include ('class_html.php');
include ('class_image.php');
include ('class_blogger.php');
if (! class_exists('Application')) {

    class Application{
        public $db;
        private $html;
        private $image;
		private $category;
        /**
         * Assign new constructore objects
         */
        function __construct()
        {
            $this->db = new Database();
            $this->html = new html();
            $this->image = new Image();
			$this->enableCategory();			
        }

        public function getLatestPost(){
			
		}
		
		public function getCategories(){
			return $this->category;
		}
		
        /**
         * This function will create a new custom post
         * @param array $post
         */
        public function createCustomPost($post)
        {
			$postvalid = $this->validateContent($post);
			if($postvalid == TRUE){
				$image = $this->image->getImageUrl($post['image'], FALSE);
				if($image == FALSE){
					echo json_encode(array("status" => 'fail', "msg" => "Unable to handle image"));
				}elseif((isset($image['status'])) AND $image['status'] == "success"){
					$post['image'] = $image['url'];
					/* Retrive tags and set html content */
					$tags = $this->getCategoryTags($post['category']);
					$post['tags'] = array_merge($post['tags'],$tags);
					$content = $this->prepairPost($post);
					$result = $this->createPost($content);
				}else{
					echo json_encode($image);
				}
			}else{
				echo json_encode( $postvalid );
			}
        }
				
        /**
         * This function will check the login of application
         * @param boolean $notloginPage
         */
        public function checkIsLogin($notloginPage = TRUE)
        {
            if ($this->isLogin() != TRUE and $notloginPage == TRUE) {
                header('Location: login.php');
            } elseif ($this->isLogin() == TRUE and $notloginPage == FALSE) {
                header('Location: index.php');
            }
        }

        public function isLogin()
        {
            return (isset($_SESSION['login']) and $_SESSION['login'] == TRUE) ? TRUE : FALSE;
        }

        public function validateLogin($username, $password)
        {
			$user = $this->checkLogin($username, $password);
			if ( $user != FALSE){
                $this->setLoginUser($user);
                header('Location: index.php');
                exit();
            }
            return FALSE;
        }

        public function logout()
        {
            session_destroy();
        }

        /* Private function written */
		
		private function prepairPost($post){
			$blog['title'] 	= $post['title'];
			$blog['url'] 	= $post['url'];
			$blog['tags'] 	= $post['tags'];
			
			$body = '<div class="_supr">';
			if(isset($post['image'])){
				$body .= '<div class="_image"><img src="' . $post['image'] . '"/></div>';				
			}
			$body .= '<div class="_content">' . htmlspecialchars($post['content']) . '</div>';
			$body .= '<div class="hidden _thisinfo" data-shorturl="{shorturl}"></div>';
			$body .= '</div>';
			
			$blog['body'] = $body;
			return $blog;
		}
		private function createPost($post){
			
		}
		
        private function checkLogin($username, $password){
			$user = $this->db->getUser($username);
			if(is_array($user) && isset($user['password'])){
				return ($user['password'] == $password)? $user : FALSE;
			}else{
				return FALSE;
			}
        }
		
		private function enableCategory(){
			$this->category = array();
			$this->category['entertainment'] 	= array("name" => "Entertainment", "tags" => "entertainment");
			$this->category['sport'] 			= array("name" => "Sport", "tags" => "sport");
			$this->category['Bollywood'] 		= array("name" => "Bollywood Gossip", "tags" => "bollywood");
		}
		
        private function setLoginUser($user){
            $_SESSION['username'] = (isset($user['username']))?$user['username'] : NULL;
            $_SESSION['userid'] = (isset($user['id']))?$user['id'] : NULL;
            $_SESSION['email'] = (isset($user['email']))?$user['email'] : NULL;
            $_SESSION['login'] = TRUE;
        }
		
		/* This function will return the category tags */
		private function getCategoryTags($category){
			return (isset($this->category[$category]))? explode(',', $this->category[$category]["tags"]) : array();
		}
		
		private function validateContent($post){			
			if($post['title'] == "" || strlen($post['title']) < 10){
				return array("status" => 'fail', "msg" => "Provide a valid title for this article");
			}else if($post['content'] == "" || strlen($post['content']) < 100){
				return array("status" => 'fail', "msg" => "Provide a valid content for this article");
			}else if($post['url'] == "" || strlen($post['url']) < 15){
				return array("status" => 'fail', "msg" => "Provide a valid url for this article");
			}else if($post['category'] == "" || !array_key_exists($post['category'],$this->category)){
				return array("status" => 'fail', "msg" => "Invalid category you selected");
			}
			return TRUE;
		}
    }
}