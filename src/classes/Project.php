<?php
    require_once '../../config/Db.php';
     abstract class Project extends Db{
        protected $project_id;
        protected $project_name;
        protected $member_id;

        public function __construct($project_name, $member_id)
        {
            $this->project_name = $project_name;
            $this->member_id = $member_id;
        }   

        public function showprojects(){
            $query = "SELECT * FROM projects";
            $stmt = $this->connect()->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function deleteproject($project_id){
          $mem = "SELECT COUNT(*) AS found FROM activities WHERE project_id = ?";
          $sstm = $this->connect()->prepare($mem);
          $sstm->execute([$project_id]);
          $m = $sstm->fetch(PDO::FETCH_ASSOC);
          if($m["found"] > 0){
            echo "can't delete member";
          }
          else{
            $query = "DELETE FROM projects WHERE project_id = ?";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute([$project_id]);
          }
        }

        public function showpr($member_id){
            $query = "SELECT * FROM projects WHERE member_id = ?";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute([$member_id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }


        abstract function addproject();
        abstract function showAll();
        abstract function deletepr($project_id);
        abstract function showone($member_id);
    }
?>