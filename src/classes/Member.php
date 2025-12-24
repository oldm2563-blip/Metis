<?php
require_once '../../config/Db.php';
    class Member extends Db {
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

        public function allmembers(){
          $query = "SELECT * FROM members";
          $stmt = $this->connect()->query($query);
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function memberinf($member_id){
            $query = "SELECT * FROM members WHERE member_id = ?";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute([$member_id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function destroymem($member_id){
            $query = "DELETE FROM members WHERE member_id = ?";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute([$member_id]);
            return "deleting was a success";
        }

        public function editmember($member_id, $member_name, $member_email, $phone_num){
          $query = "UPDATE members SET full_name = ?, email = ?, phone = ? WHERE member_id = ?";
          $stmt = $this->connect()->prepare($query);
          $stmt->execute([$member_name, $member_email, $phone_num, $member_id]);
          return "editting was a success";
        }
    }

?>