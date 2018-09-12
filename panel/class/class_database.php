<?php
if (! class_exists('Database')) {
    class Database{
        private $db;
        function __construct(){
			global $config;
			$this->db = new mysqli($config->get('DB-HOST'), $config->get('DB-USER'), $config->get('DB-PASSWORD'), $config->get('DB-DATABASE'));
            if ($this->db->connect_error){
                die("Connection failed: " . $this->db->connect_error);
            }
        }

		public function getUser($username){
			$sql = "select * from users where username='$username'";
			$data = $this->runMyQuery($sql, 'select');
			return (count($data) == 1 AND isset($data[0]))? $data[0] : $data;
		}
		
        
        private function runMyQuery($sql, $operation = 'insert', $returnid = false, $updatecount = false, $rows = false)
        {
            $query = $this->db->query($sql);
            if ($query == false) {
                echo $this->db->error;
                return false;
            }
            
            switch ($operation) {
                case 'insert':
                    if ($query !== FALSE) {
                        if ($returnid == true) {
                            return $this->db->insert_id;
                        } else {
                            return true;
                        }
                    }
                    break;
                case 'select':
                    if ($rows == true) {
                        return $this->db->num_rows;
                    } else {
                        return $query->fetch_all(MYSQLI_ASSOC);
                    }
                    break;
            }
        }
    }
}