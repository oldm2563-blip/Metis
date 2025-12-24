<?php
    class Longpr extends Project{

        private $project_type = "LongProject";

        public function addproject(){
            $query = "INSERT INTO projects (project_name, project_type, member_id) VALUES (? , ? , ?)";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute([$this->project_name, $this->project_type, $this->member_id]);
        }
        public function showAll(){
            return $this->showprojects();
        }
        public function deletepr($project_id){
            return $this->deleteproject($project_id);
        }

        public function showone($member_id)
        {
            return $this->showpr($member_id);
        }
    }
?>