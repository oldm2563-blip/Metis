<?php
    class Shortpr extends Project{

        private $project_type = "ShortProject";

        public function addproject(){
            $query = "INSERT INTO projects (project_name, project_type, member_id) VALUES (? , ? , ?)";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute([$this->project_name, $this->project_type, $this->member_id]);
        }
        public function show(){
            return $this->showprojects();
        }
    }
?>