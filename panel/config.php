<?php
if(!class_exists('Config')){
	class Config{
		public $config;
		public function __construct(){
			$this->config = array();
			$this->config['DB-HOST'] = "localhost";
			$this->config['DB-USER'] = "root";
			$this->config['DB-PASSWORD'] = "root";
			$this->config['DB-DATABASE'] = "gossip";
			$this->config['B-BLOGID'] = "21511651";
			$this->config['G-APIKEY'] = "";
			$this->config['G-CLIENT'] = "";
			$this->config['G-SECRET'] = "";
			$this->config['G-REDIRECT'] = "http://www.server.com/panel/accept-token.php";
			$this->config['B-APICREATE'] = 'https://www.googleapis.com/blogger/v3/blogs/' . $this->config['B-BLOGID'] . '/posts/';
		}
		
		public function get($key){
			return (isset($this->config[$key]))? $this->config[$key] : "";
		}
	}
}
global $config;
$config = new Config();