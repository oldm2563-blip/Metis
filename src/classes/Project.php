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
        
        abstract function addproject();
    }
?>