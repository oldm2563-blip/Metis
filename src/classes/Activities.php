<?php
require_once '../../config/Db.php';
    class Activities extends Db{
        private $activity_id;
        private $activity_name;
        private $project_id;

        public function __construct($activity_name, $project_id){
            $this->activity_name = $activity_name;
            $this->project_id = $project_id;
        }

        public function addactivity(){
            $query = "INSERT INTO activities (activity_name, project_id) VALUES (?, ?)";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute([$this->activity_name, $this->project_id]);
        }

        public function show_activities($project_id){
            $query = "SELECT * FROM activities WHERE project_id = ?";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute([$project_id]);
        }

        public function Delete_activity($activity_id){
            $query = "DELETE FROM activities WHERE project_id = ?";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute([$activity_id]);
        }

        public function editactivity($activity_id, $activity_name, $project_id){
            $query = "UPDATE activities SET activity_name = ? , project_id = ? WHERE activity_id = ?";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute([$activity_name, $project_id, $activity_id]);
        }
    }
?>