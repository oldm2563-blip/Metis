<?php
require_once '../../config/connect.php';
    class member extends db{
        private $member_id;
        private $member_name;
        private $member_email;
        private $phone_num;
        public function __construct($member_name, $member_email, $phone_num)
         {
           $this->member_name = $member_name;
           $this->member_email = $member_email;
           $this->phone_num = $phone_num;
         }
        public function addmember(){
          $query = "INSERT INTO members (full_name, email, phone) VALUES (?, ?, ?)";
          $stmt = $this->connect()->prepare($query);
          return $stmt->execute([$this->member_name, $this->member_email, $this->phone_num]);
        }
    }

?>